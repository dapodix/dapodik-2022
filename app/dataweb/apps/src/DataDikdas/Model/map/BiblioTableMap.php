<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'pustaka.biblio' table.
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
class BiblioTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.BiblioTableMap';

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
        $this->setName('pustaka.biblio');
        $this->setPhpName('Biblio');
        $this->setClassname('DataDikdas\\Model\\Biblio');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id_biblio', 'IdBiblio', 'VARCHAR', true, null, null);
        $this->addForeignKey('id_freq', 'IdFreq', 'DECIMAL', 'pustaka.frequency', 'id_freq', false, 131072, null);
        $this->addColumn('id_publisher', 'IdPublisher', 'VARCHAR', false, null, null);
        $this->addForeignKey('negara_id', 'NegaraId', 'CHAR', 'ref.negara', 'negara_id', true, 2, null);
        $this->addForeignKey('id_gmd', 'IdGmd', 'VARCHAR', 'pustaka.gmd', 'id_gmd', true, 3, null);
        $this->addForeignKey('id_classification', 'IdClassification', 'VARCHAR', 'pustaka.classifications', 'id_classification', false, null, null);
        $this->addColumn('create_date', 'CreateDate', 'TIMESTAMP', true, null, 'now()');
        $this->addColumn('title', 'Title', 'VARCHAR', true, 256, null);
        $this->addColumn('sor', 'Sor', 'VARCHAR', false, 200, null);
        $this->addColumn('edition', 'Edition', 'VARCHAR', false, 50, null);
        $this->addColumn('isbn_issn', 'IsbnIssn', 'VARCHAR', false, 32, null);
        $this->addColumn('collations', 'Collations', 'VARCHAR', true, 50, null);
        $this->addColumn('publisher', 'Publisher', 'VARCHAR', false, 100, null);
        $this->addColumn('publish_year', 'PublishYear', 'VARCHAR', false, 20, null);
        $this->addColumn('series_title', 'SeriesTitle', 'VARCHAR', false, 200, null);
        $this->addColumn('call_number', 'CallNumber', 'VARCHAR', false, 50, null);
        $this->addColumn('source', 'Source', 'VARCHAR', false, 3, null);
        $this->addColumn('publish_place', 'PublishPlace', 'VARCHAR', false, 200, null);
        $this->addColumn('notes', 'Notes', 'VARCHAR', false, 2000, null);
        $this->addColumn('image', 'Image', 'VARCHAR', false, 100, null);
        $this->addColumn('file_att', 'FileAtt', 'VARCHAR', false, 255, null);
        $this->addColumn('opac_hide', 'OpacHide', 'DECIMAL', false, 65536, null);
        $this->addColumn('promoted', 'Promoted', 'DECIMAL', false, 65536, null);
        $this->addColumn('labels', 'Labels', 'VARCHAR', false, 2000, null);
        $this->addColumn('paper_printing_spec', 'PaperPrintingSpec', 'VARCHAR', false, 500, null);
        $this->addColumn('last_sync', 'LastSync', 'TIMESTAMP', true, null, '1901-01-01 00:00:00');
        $this->addColumn('last_update', 'LastUpdate', 'TIMESTAMP', true, null, 'now()');
        $this->addColumn('expired_date', 'ExpiredDate', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Classifications', 'DataDikdas\\Model\\Classifications', RelationMap::MANY_TO_ONE, array('id_classification' => 'id_classification', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Frequency', 'DataDikdas\\Model\\Frequency', RelationMap::MANY_TO_ONE, array('id_freq' => 'id_freq', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Gmd', 'DataDikdas\\Model\\Gmd', RelationMap::MANY_TO_ONE, array('id_gmd' => 'id_gmd', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Negara', 'DataDikdas\\Model\\Negara', RelationMap::MANY_TO_ONE, array('negara_id' => 'negara_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Buku', 'DataDikdas\\Model\\Buku', RelationMap::ONE_TO_MANY, array('id_biblio' => 'id_biblio', ), 'RESTRICT', 'RESTRICT', 'Bukus');
        $this->addRelation('BukuPelajaran', 'DataDikdas\\Model\\BukuPelajaran', RelationMap::ONE_TO_MANY, array('id_biblio' => 'id_biblio', ), 'RESTRICT', 'RESTRICT', 'BukuPelajarans');
        $this->addRelation('DaftarAuthor', 'DataDikdas\\Model\\DaftarAuthor', RelationMap::ONE_TO_MANY, array('id_biblio' => 'id_biblio', ), 'RESTRICT', 'RESTRICT', 'DaftarAuthors');
        $this->addRelation('MapelBiblio', 'DataDikdas\\Model\\MapelBiblio', RelationMap::ONE_TO_MANY, array('id_biblio' => 'id_biblio', ), 'RESTRICT', 'RESTRICT', 'MapelBiblios');
        $this->addRelation('TingkatBiblio', 'DataDikdas\\Model\\TingkatBiblio', RelationMap::ONE_TO_MANY, array('id_biblio' => 'id_biblio', ), 'RESTRICT', 'RESTRICT', 'TingkatBiblios');
    } // buildRelations()

} // BiblioTableMap
