<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ref.jabatan_tugas_ptk' table.
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
class JabatanTugasPtkTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.JabatanTugasPtkTableMap';

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
        $this->setName('ref.jabatan_tugas_ptk');
        $this->setPhpName('JabatanTugasPtk');
        $this->setClassname('DataDikdas\\Model\\JabatanTugasPtk');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('jabatan_ptk_id', 'JabatanPtkId', 'DECIMAL', true, 327680, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', true, 50, null);
        $this->addColumn('jabatan_utama', 'JabatanUtama', 'DECIMAL', true, 65536, null);
        $this->addColumn('tugas_tambahan_guru', 'TugasTambahanGuru', 'DECIMAL', true, 65536, null);
        $this->addColumn('jumlah_jam_diakui', 'JumlahJamDiakui', 'DECIMAL', false, 131072, null);
        $this->addColumn('harus_refer_unit_org', 'HarusReferUnitOrg', 'DECIMAL', true, 65536, 0);
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
        $this->addRelation('RwyStruktural', 'DataDikdas\\Model\\RwyStruktural', RelationMap::ONE_TO_MANY, array('jabatan_ptk_id' => 'jabatan_ptk_id', ), 'RESTRICT', 'RESTRICT', 'RwyStrukturals');
        $this->addRelation('TugasTambahan', 'DataDikdas\\Model\\TugasTambahan', RelationMap::ONE_TO_MANY, array('jabatan_ptk_id' => 'jabatan_ptk_id', ), 'RESTRICT', 'RESTRICT', 'TugasTambahans');
    } // buildRelations()

} // JabatanTugasPtkTableMap
