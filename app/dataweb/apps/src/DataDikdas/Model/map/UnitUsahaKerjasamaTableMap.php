<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'unit_usaha_kerjasama' table.
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
class UnitUsahaKerjasamaTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.UnitUsahaKerjasamaTableMap';

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
        $this->setName('unit_usaha_kerjasama');
        $this->setPhpName('UnitUsahaKerjasama');
        $this->setClassname('DataDikdas\\Model\\UnitUsahaKerjasama');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('mou_id', 'MouId', 'VARCHAR' , 'mou', 'mou_id', true, null, null);
        $this->addForeignPrimaryKey('unit_usaha_id', 'UnitUsahaId', 'VARCHAR' , 'unit_usaha', 'unit_usaha_id', true, null, null);
        $this->addForeignKey('sumber_dana_id', 'SumberDanaId', 'DECIMAL', 'ref.sumber_dana', 'sumber_dana_id', true, 196608, null);
        $this->addColumn('produk_barang_dihasilkan', 'ProdukBarangDihasilkan', 'VARCHAR', false, 200, null);
        $this->addColumn('jasa_produksi_dihasilkan', 'JasaProduksiDihasilkan', 'VARCHAR', false, 200, null);
        $this->addColumn('omzet_barang_perbulan', 'OmzetBarangPerbulan', 'DECIMAL', false, 1179648, null);
        $this->addColumn('omzet_jasa_perbulan', 'OmzetJasaPerbulan', 'DECIMAL', false, 1179648, null);
        $this->addColumn('prestasi_penghargaan', 'PrestasiPenghargaan', 'VARCHAR', false, 200, null);
        $this->addColumn('pangsa_pasar_produk', 'PangsaPasarProduk', 'VARCHAR', false, 200, null);
        $this->addColumn('pangsa_pasar_jasa', 'PangsaPasarJasa', 'VARCHAR', false, 200, null);
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
        $this->addRelation('UnitUsaha', 'DataDikdas\\Model\\UnitUsaha', RelationMap::MANY_TO_ONE, array('unit_usaha_id' => 'unit_usaha_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Mou', 'DataDikdas\\Model\\Mou', RelationMap::MANY_TO_ONE, array('mou_id' => 'mou_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('SumberDana', 'DataDikdas\\Model\\SumberDana', RelationMap::MANY_TO_ONE, array('sumber_dana_id' => 'sumber_dana_id', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

} // UnitUsahaKerjasamaTableMap
