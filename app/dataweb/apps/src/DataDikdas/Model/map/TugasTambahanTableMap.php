<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'tugas_tambahan' table.
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
class TugasTambahanTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.TugasTambahanTableMap';

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
        $this->setName('tugas_tambahan');
        $this->setPhpName('TugasTambahan');
        $this->setClassname('DataDikdas\\Model\\TugasTambahan');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('ptk_tugas_tambahan_id', 'PtkTugasTambahanId', 'VARCHAR', true, null, null);
        $this->addForeignKey('ptk_id', 'PtkId', 'VARCHAR', 'ptk', 'ptk_id', true, null, null);
        $this->addForeignKey('id_ruang', 'IdRuang', 'VARCHAR', 'ruang', 'id_ruang', false, null, null);
        $this->addForeignKey('jabatan_ptk_id', 'JabatanPtkId', 'DECIMAL', 'ref.jabatan_tugas_ptk', 'jabatan_ptk_id', true, 327680, null);
        $this->addForeignKey('sekolah_id', 'SekolahId', 'VARCHAR', 'sekolah', 'sekolah_id', true, null, null);
        $this->addColumn('jumlah_jam', 'JumlahJam', 'DECIMAL', true, 131072, null);
        $this->addColumn('nomor_sk', 'NomorSk', 'VARCHAR', true, 80, null);
        $this->addColumn('tmt_tambahan', 'TmtTambahan', 'DATE', true, null, null);
        $this->addColumn('tst_tambahan', 'TstTambahan', 'DATE', false, null, null);
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
        $this->addRelation('Ruang', 'DataDikdas\\Model\\Ruang', RelationMap::MANY_TO_ONE, array('id_ruang' => 'id_ruang', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('JabatanTugasPtk', 'DataDikdas\\Model\\JabatanTugasPtk', RelationMap::MANY_TO_ONE, array('jabatan_ptk_id' => 'jabatan_ptk_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Ptk', 'DataDikdas\\Model\\Ptk', RelationMap::MANY_TO_ONE, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Sekolah', 'DataDikdas\\Model\\Sekolah', RelationMap::MANY_TO_ONE, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('VldTugasTambahan', 'DataDikdas\\Model\\VldTugasTambahan', RelationMap::ONE_TO_MANY, array('ptk_tugas_tambahan_id' => 'ptk_tugas_tambahan_id', ), 'RESTRICT', 'RESTRICT', 'VldTugasTambahans');
    } // buildRelations()

} // TugasTambahanTableMap
