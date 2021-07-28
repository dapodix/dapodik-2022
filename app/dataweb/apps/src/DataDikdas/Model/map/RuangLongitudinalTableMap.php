<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ruang_longitudinal' table.
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
class RuangLongitudinalTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.RuangLongitudinalTableMap';

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
        $this->setName('ruang_longitudinal');
        $this->setPhpName('RuangLongitudinal');
        $this->setClassname('DataDikdas\\Model\\RuangLongitudinal');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('id_ruang', 'IdRuang', 'VARCHAR' , 'ruang', 'id_ruang', true, null, null);
        $this->addForeignPrimaryKey('semester_id', 'SemesterId', 'CHAR' , 'ref.semester', 'semester_id', true, 5, null);
        $this->addForeignKey('blob_id', 'BlobId', 'VARCHAR', 'blob.large_object', 'blob_id', false, null, null);
        $this->addColumn('asal_data', 'AsalData', 'CHAR', true, 1, '1');
        $this->addColumn('rusak_lisplang_talang', 'RusakLisplangTalang', 'DECIMAL', true, 393218, 0);
        $this->addColumn('ket_lisplang_talang', 'KetLisplangTalang', 'VARCHAR', false, 120, null);
        $this->addColumn('rusak_rangka_plafon', 'RusakRangkaPlafon', 'DECIMAL', true, 393218, 0);
        $this->addColumn('ket_rangka_plafon', 'KetRangkaPlafon', 'VARCHAR', false, 120, null);
        $this->addColumn('rusak_tutup_plafon', 'RusakTutupPlafon', 'DECIMAL', true, 393218, 0);
        $this->addColumn('ket_tutup_plafon', 'KetTutupPlafon', 'VARCHAR', false, 120, null);
        $this->addColumn('rusak_bata_dinding', 'RusakBataDinding', 'DECIMAL', true, 393218, 0);
        $this->addColumn('ket_bata_dinding', 'KetBataDinding', 'VARCHAR', false, 120, null);
        $this->addColumn('rusak_plester_dinding', 'RusakPlesterDinding', 'DECIMAL', true, 393218, 0);
        $this->addColumn('ket_plester_dinding', 'KetPlesterDinding', 'VARCHAR', false, 120, null);
        $this->addColumn('rusak_daun_jendela', 'RusakDaunJendela', 'DECIMAL', true, 393218, 0);
        $this->addColumn('ket_daun_jendela', 'KetDaunJendela', 'VARCHAR', false, 120, null);
        $this->addColumn('rusak_daun_pintu', 'RusakDaunPintu', 'DECIMAL', true, 393218, 0);
        $this->addColumn('ket_daun_pintu', 'KetDaunPintu', 'VARCHAR', false, 120, null);
        $this->addColumn('rusak_kusen', 'RusakKusen', 'DECIMAL', true, 393218, 0);
        $this->addColumn('ket_kusen', 'KetKusen', 'VARCHAR', false, 120, null);
        $this->addColumn('rusak_tutup_lantai', 'RusakTutupLantai', 'DECIMAL', true, 393218, 0);
        $this->addColumn('ket_penutup_lantai', 'KetPenutupLantai', 'VARCHAR', false, 120, null);
        $this->addColumn('rusak_inst_listrik', 'RusakInstListrik', 'DECIMAL', true, 393218, 0);
        $this->addColumn('ket_inst_listrik', 'KetInstListrik', 'VARCHAR', false, 120, null);
        $this->addColumn('rusak_inst_air', 'RusakInstAir', 'DECIMAL', true, 393218, 0);
        $this->addColumn('ket_inst_air', 'KetInstAir', 'VARCHAR', false, 120, null);
        $this->addColumn('rusak_drainase', 'RusakDrainase', 'DECIMAL', true, 393218, 0);
        $this->addColumn('ket_drainase', 'KetDrainase', 'VARCHAR', false, 120, null);
        $this->addColumn('rusak_finish_struktur', 'RusakFinishStruktur', 'DECIMAL', true, 393218, 0);
        $this->addColumn('ket_finish_struktur', 'KetFinishStruktur', 'VARCHAR', false, 120, null);
        $this->addColumn('rusak_finish_plafon', 'RusakFinishPlafon', 'DECIMAL', true, 393218, 0);
        $this->addColumn('ket_finish_plafon', 'KetFinishPlafon', 'VARCHAR', false, 120, null);
        $this->addColumn('rusak_finish_dinding', 'RusakFinishDinding', 'DECIMAL', true, 393218, 0);
        $this->addColumn('ket_finish_dinding', 'KetFinishDinding', 'VARCHAR', false, 120, null);
        $this->addColumn('rusak_finish_kpj', 'RusakFinishKpj', 'DECIMAL', true, 393218, 0);
        $this->addColumn('ket_finish_kpj', 'KetFinishKpj', 'VARCHAR', false, 120, null);
        $this->addColumn('berfungsi', 'Berfungsi', 'DECIMAL', true, 65536, 1);
        $this->addColumn('create_date', 'CreateDate', 'TIMESTAMP', true, null, '2021-06-07 11:49:57.910477');
        $this->addColumn('last_update', 'LastUpdate', 'TIMESTAMP', true, null, '2021-06-07 11:49:57.910477');
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
        $this->addRelation('Ruang', 'DataDikdas\\Model\\Ruang', RelationMap::MANY_TO_ONE, array('id_ruang' => 'id_ruang', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('LargeObject', 'DataDikdas\\Model\\LargeObject', RelationMap::MANY_TO_ONE, array('blob_id' => 'blob_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Semester', 'DataDikdas\\Model\\Semester', RelationMap::MANY_TO_ONE, array('semester_id' => 'semester_id', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

} // RuangLongitudinalTableMap
