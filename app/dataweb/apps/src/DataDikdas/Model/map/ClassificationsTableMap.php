<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'pustaka.classifications' table.
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
class ClassificationsTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.ClassificationsTableMap';

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
        $this->setName('pustaka.classifications');
        $this->setPhpName('Classifications');
        $this->setClassname('DataDikdas\\Model\\Classifications');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id_classification', 'IdClassification', 'VARCHAR', true, null, null);
        $this->addForeignKey('id_classification_parent', 'IdClassificationParent', 'VARCHAR', 'pustaka.classifications', 'id_classification', false, null, null);
        $this->addColumn('classification_name', 'ClassificationName', 'VARCHAR', false, 255, null);
        $this->addColumn('parent_path', 'ParentPath', 'VARCHAR', false, 255, null);
        $this->addColumn('assessment_template_id', 'AssessmentTemplateId', 'INTEGER', false, null, 1);
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
        $this->addRelation('ClassificationsRelatedByIdClassificationParent', 'DataDikdas\\Model\\Classifications', RelationMap::MANY_TO_ONE, array('id_classification_parent' => 'id_classification', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Biblio', 'DataDikdas\\Model\\Biblio', RelationMap::ONE_TO_MANY, array('id_classification' => 'id_classification', ), 'RESTRICT', 'RESTRICT', 'Biblios');
        $this->addRelation('ClassificationsRelatedByIdClassification', 'DataDikdas\\Model\\Classifications', RelationMap::ONE_TO_MANY, array('id_classification' => 'id_classification_parent', ), 'RESTRICT', 'RESTRICT', 'ClassificationssRelatedByIdClassification');
    } // buildRelations()

} // ClassificationsTableMap
