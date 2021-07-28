<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ref.jenis_ptk' table.
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
class JenisPtkTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.JenisPtkTableMap';

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
        $this->setName('ref.jenis_ptk');
        $this->setPhpName('JenisPtk');
        $this->setClassname('DataDikdas\\Model\\JenisPtk');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('jenis_ptk_id', 'JenisPtkId', 'DECIMAL', true, 131072, null);
        $this->addColumn('jenis_ptk', 'JenisPtk', 'VARCHAR', true, 30, null);
        $this->addColumn('guru_kelas', 'GuruKelas', 'DECIMAL', true, 65536, null);
        $this->addColumn('guru_matpel', 'GuruMatpel', 'DECIMAL', true, 65536, null);
        $this->addColumn('guru_bk', 'GuruBk', 'DECIMAL', true, 65536, null);
        $this->addColumn('guru_inklusi', 'GuruInklusi', 'DECIMAL', true, 65536, null);
        $this->addColumn('guru_pengganti', 'GuruPengganti', 'DECIMAL', true, 65536, 0);
        $this->addColumn('pengawas_satdik', 'PengawasSatdik', 'DECIMAL', true, 65536, null);
        $this->addColumn('pengawas_plb', 'PengawasPlb', 'DECIMAL', true, 65536, null);
        $this->addColumn('pengawas_matpel', 'PengawasMatpel', 'DECIMAL', true, 65536, null);
        $this->addColumn('pengawas_bidang', 'PengawasBidang', 'DECIMAL', true, 65536, null);
        $this->addColumn('tas', 'Tas', 'DECIMAL', true, 65536, null);
        $this->addColumn('tendik_lainnya', 'TendikLainnya', 'DECIMAL', true, 65536, 0);
        $this->addColumn('formal', 'Formal', 'DECIMAL', true, 65536, null);
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
        $this->addRelation('Ptk', 'DataDikdas\\Model\\Ptk', RelationMap::ONE_TO_MANY, array('jenis_ptk_id' => 'jenis_ptk_id', ), 'RESTRICT', 'RESTRICT', 'Ptks');
        $this->addRelation('RwyKerja', 'DataDikdas\\Model\\RwyKerja', RelationMap::ONE_TO_MANY, array('jenis_ptk_id' => 'jenis_ptk_id', ), 'RESTRICT', 'RESTRICT', 'RwyKerjas');
    } // buildRelations()

} // JenisPtkTableMap
