<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'riwayat_gaji_berkala' table.
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
class RiwayatGajiBerkalaTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.RiwayatGajiBerkalaTableMap';

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
        $this->setName('riwayat_gaji_berkala');
        $this->setPhpName('RiwayatGajiBerkala');
        $this->setClassname('DataDikdas\\Model\\RiwayatGajiBerkala');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('riwayat_gaji_berkala_id', 'RiwayatGajiBerkalaId', 'VARCHAR', true, null, null);
        $this->addForeignKey('ptk_id', 'PtkId', 'VARCHAR', 'ptk', 'ptk_id', true, null, null);
        $this->addForeignKey('pangkat_golongan_id', 'PangkatGolonganId', 'DECIMAL', 'ref.pangkat_golongan', 'pangkat_golongan_id', true, 131072, null);
        $this->addColumn('nomor_sk', 'NomorSk', 'VARCHAR', true, 80, null);
        $this->addColumn('tanggal_sk', 'TanggalSk', 'DATE', true, null, null);
        $this->addColumn('tmt_kgb', 'TmtKgb', 'DATE', true, null, null);
        $this->addColumn('masa_kerja_tahun', 'MasaKerjaTahun', 'DECIMAL', true, 131072, null);
        $this->addColumn('masa_kerja_bulan', 'MasaKerjaBulan', 'DECIMAL', true, 131072, null);
        $this->addColumn('gaji_pokok', 'GajiPokok', 'DECIMAL', false, 589824, null);
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
        $this->addRelation('Ptk', 'DataDikdas\\Model\\Ptk', RelationMap::MANY_TO_ONE, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('PangkatGolongan', 'DataDikdas\\Model\\PangkatGolongan', RelationMap::MANY_TO_ONE, array('pangkat_golongan_id' => 'pangkat_golongan_id', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

} // RiwayatGajiBerkalaTableMap
