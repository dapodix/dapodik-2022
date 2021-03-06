<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ref.jenis_buku_alat' table.
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
class JenisBukuAlatTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.JenisBukuAlatTableMap';

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
        $this->setName('ref.jenis_buku_alat');
        $this->setPhpName('JenisBukuAlat');
        $this->setClassname('DataDikdas\\Model\\JenisBukuAlat');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('jenis_buku_alat_id', 'JenisBukuAlatId', 'DECIMAL', true, 393216, null);
        $this->addColumn('jenis_buku_alat', 'JenisBukuAlat', 'VARCHAR', true, 60, null);
        $this->addColumn('spm_qty_min_per_siswa', 'SpmQtyMinPerSiswa', 'DECIMAL', true, 196609, null);
        $this->addColumn('spm_qty_min_per_sekolah', 'SpmQtyMinPerSekolah', 'DECIMAL', true, 262144, null);
        $this->addColumn('create_date', 'CreateDate', 'TIMESTAMP', true, null, 'now()');
        $this->addColumn('last_update', 'LastUpdate', 'TIMESTAMP', true, null, 'now()');
        $this->addColumn('expired_date', 'ExpiredDate', 'TIMESTAMP', false, null, 'now()');
        $this->addColumn('last_sync', 'LastSync', 'TIMESTAMP', true, null, 'now()');
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // JenisBukuAlatTableMap
