<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'nilai.un' table.
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
class UnTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.UnTableMap';

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
        $this->setName('nilai.un');
        $this->setPhpName('Un');
        $this->setClassname('DataDikdas\\Model\\Un');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('un_id', 'UnId', 'VARCHAR', true, null, null);
        $this->addColumn('registrasi_id', 'RegistrasiId', 'VARCHAR', true, null, null);
        $this->addForeignKey('tahun_ajaran_id', 'TahunAjaranId', 'DECIMAL', 'ref.tahun_ajaran', 'tahun_ajaran_id', true, 262144, null);
        $this->addColumn('un_tgl_daftar', 'UnTglDaftar', 'DATE', true, null, null);
        $this->addColumn('nomor_un', 'NomorUn', 'VARCHAR', false, 20, null);
        $this->addColumn('no_skhun', 'NoSkhun', 'CHAR', false, 20, null);
        $this->addColumn('nilai_1', 'Nilai1', 'DECIMAL', false, 327682, null);
        $this->addColumn('nilai_2', 'Nilai2', 'DECIMAL', false, 327682, null);
        $this->addColumn('nilai_3', 'Nilai3', 'DECIMAL', false, 327682, null);
        $this->addColumn('nilai_4', 'Nilai4', 'DECIMAL', false, 327682, null);
        $this->addColumn('nilai_5', 'Nilai5', 'DECIMAL', false, 327682, null);
        $this->addColumn('nilai_6', 'Nilai6', 'DECIMAL', false, 327682, null);
        $this->addColumn('nilai_7', 'Nilai7', 'DECIMAL', false, 327682, null);
        $this->addForeignKey('template_id', 'TemplateId', 'VARCHAR', 'ref.template_un', 'template_id', true, null, null);
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
        $this->addRelation('TemplateUn', 'DataDikdas\\Model\\TemplateUn', RelationMap::MANY_TO_ONE, array('template_id' => 'template_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('TahunAjaran', 'DataDikdas\\Model\\TahunAjaran', RelationMap::MANY_TO_ONE, array('tahun_ajaran_id' => 'tahun_ajaran_id', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

} // UnTableMap
