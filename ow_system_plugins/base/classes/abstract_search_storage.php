<?php

/**
 * EXHIBIT A. Common Public Attribution License Version 1.0
 * The contents of this file are subject to the Common Public Attribution License Version 1.0 (the “License”);
 * you may not use this file except in compliance with the License. You may obtain a copy of the License at
 * http://www.oxwall.org/license. The License is based on the Mozilla Public License Version 1.1
 * but Sections 14 and 15 have been added to cover use of software over a computer network and provide for
 * limited attribution for the Original Developer. In addition, Exhibit A has been modified to be consistent
 * with Exhibit B. Software distributed under the License is distributed on an “AS IS” basis,
 * WITHOUT WARRANTY OF ANY KIND, either express or implied. See the License for the specific language
 * governing rights and limitations under the License. The Original Code is Oxwall software.
 * The Initial Developer of the Original Code is Oxwall Foundation (http://www.oxwall.org/foundation).
 * All portions of the code written by Oxwall Foundation are Copyright (c) 2011. All Rights Reserved.

 * EXHIBIT B. Attribution Information
 * Attribution Copyright Notice: Copyright 2011 Oxwall Foundation. All rights reserved.
 * Attribution Phrase (not exceeding 10 words): Powered by Oxwall community software
 * Attribution URL: http://www.oxwall.org/
 * Graphic Image as provided in the Covered Code.
 * Display of Attribution Information is required in Larger Works which are defined in the CPAL as a work
 * which combines Covered Code or portions thereof with code not governed by the terms of the CPAL.
 */

/**
 * Abstract search storage
 *
 * @author Alex Ermashev <alexermashev@gmail.com>
 * @package ow_system_plugins.base.classes
 * @since 1.0
 */
abstract class BASE_CLASS_AbstractSearchStorage
{
    /**
     * Sort by date
     */
    CONST SORT_BY_DATE = 'date';

    /**
     * Sort by relevance
     */
    CONST SORT_BY_RELEVANCE = 'relevance';

    /**
     * Active entity status 
     */
    CONST ENTITY_STATUS_ACTIVE = 1;

    /**
     * Not active entity status
     */
    CONST ENTITY_STATUS_NOT_ACTIVE = 0;

    /**
     * Add entity
     *
     * @param string $entityType
     * @param integer $entityId
     * @param string  $text
     * @param array $tags
     * @throws Exception
     * @return void
     */
    abstract public function addEntity( $entityType, $entityId, $text, array $tags = array() );

    /**
     * Set entity status
     * 
     * @param string $entityType
     * @param integer $entityId
     * @param integer $status
     * @throws Exception
     * @return void
     */
    abstract public function setEntityStatus( $entityType, $entityId, $status = self::ENTITY_STATUS_ACTIVE );

    /**
     * Delete entity
     *
     * @param string $entityType 
     * @param integer $entityId
     * @throws Exception
     * @return void
     */
    abstract public function deleteEntity( $entityType, $entityId );

    /**
     * Delete all entities
     *
     * @param string $entityType
     * @throws Exception
     * @return void
     */
    abstract public function deleteAllEntities( $entityType = null );

    /**
     * Deactivate all entities
     *
     * @param string $entityType
     * @throws Exception
     * @return void
     */
    abstract public function deactivateAllEntities( $entityType = null );

    /**
     * Activate all entities
     *
     * @param string $entityType
     * @throws Exception
     * @return void
     */
    abstract public function activateAllEntities( $entityType = null );

    /**
     * Search entities count
     *
     * @param string $text
     * @param array $tags
     * @throws Exception
     * @return integer
     */
    abstract public function searchEntitiesCount( $text, array $tags = array() );

    /**
     * Search entities
     *
     * @param string $text
     * @param integer $first
     * @param integer $limit
     * @param array $tags
     * @param string $sort
     * @throws Exception
     * @return array
     */
    abstract public function searchEntities( $text, $first, $limit, array $tags = array(), $sort = self::SORT_BY_RELEVANCE );

    /**
     * Get all entities
     *
     * @param integer $first
     * @param integer $limit
     * @param string $entityType
     * @throws Exception
     * @return array
     */
    abstract public function getAllEntities( $first, $limit, $entityType = null );

    /**
     * Clean search text
     * 
     * @param string $text
     * @return string
     */
    protected function cleanSearchText( $text )
    {
        return mb_strtolower(preg_replace('/[^\pL\pN]+/u', ' ', strip_tags($text)));
    }
}