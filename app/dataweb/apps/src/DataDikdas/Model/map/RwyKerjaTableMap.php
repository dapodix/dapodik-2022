<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'rwy_kerja' table.
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
class RwyKerjaTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.RwyKerjaTableMap';

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
        $this->setName('rwy_kerja');
        $this->setPhpName('RwyKerja');
        $this->setClassname('DataDikdas\\Model\\RwyKerja');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('rwy_kerja_id', 'RwyKerjaId', 'VARCHAR', true, null, null);
        $this->addForeignKey('jenjang_pendidikan_id', 'JenjangPendidikanId', 'DECIMAL', 'ref.jenjang_pendidikan', 'jenjang_pendidikan_id', false, 131072, null);
        $this->addForeignKey('jenis_lembaga_id', 'JenisLembagaId', 'DECIMAL', 'ref.jenis_lembaga', 'jenis_lembaga_id', true, 327680, null);
        $this->addForeignKey('status_kepegawaian_id', 'StatusKepegawaianId', 'SMALLINT', 'ref.status_kepegawaian', 'status_kepegawaian_id', true, null, null);
        $this->addForeignKey('ptk_id', 'PtkId', 'VARCHAR', 'ptk', 'ptk_id', true, null, null);
        $this->addForeignKey('jenis_ptk_id', 'JenisPtkId', 'DECIMAL', 'ref.jenis_ptk', 'jenis_ptk_id', true, 131072, null);
        $this->addColumn('lembaga_pengangkat', 'LembagaPengangkat', 'VARCHAR', true, 100, null);
        $this->addColumn('no_sk_kerja', 'NoSkKerja', 'VARCHAR', true, 80, null);
        $this->addColumn('tgl_sk_kerja', 'TglSkKerja', 'DATE', true, null, null);
        $this->addColumn('tmt_kerja', 'TmtKerja', 'DATE', true, null, null);
        $this->addColumn('tst_kerja', 'TstKerja', 'DATE', false, null, null);
        $this->addColumn('tempat_kerja', 'TempatKerja', 'VARCHAR', true, 100, null);
        $this->addColumn('ttd_sk_kerja', 'TtdSkKerja', 'VARCHAR', false, 80, null);
        $this->addColumn('mapel_diajarkan', 'MapelDiajarkan', 'VARCHAR', false, 80, null);
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
        $this->addRelation('JenisLembaga', 'DataDikdas\\Model\\JenisLembaga', RelationMap::MANY_TO_ONE, array('jenis_lembaga_id' => 'jenis_lembaga_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('JenisPtk', 'DataDikdas\\Model\\JenisPtk', RelationMap::MANY_TO_ONE, array('jenis_ptk_id' => 'jenis_ptk_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Ptk', 'DataDikdas\\Model\\Ptk', RelationMap::MANY_TO_ONE, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('StatusKepegawaian', 'DataDikdas\\Model\\StatusKepegawaian', RelationMap::MANY_TO_ONE, array('status_kepegawaian_id' => 'status_kepegawaian_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('JenjangPendidikan', 'DataDikdas\\Model\\JenjangPendidikan', RelationMap::MANY_TO_ONE, array('jenjang_pendidikan_id' => 'jenjang_pendidikan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('VldRwyKerja', 'DataDikdas\\Model\\VldRwyKerja', RelationMap::ONE_TO_MANY, array('rwy_kerja_id' => 'rwy_kerja_id', ), 'RESTRICT', 'RESTRICT', 'VldRwyKerjas');
    } // buildRelations()

} // RwyKerjaTableMap
