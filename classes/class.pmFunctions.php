<?php
/**
 * class.pmMantisBt.pmFunctions.php
 *
 * ProcessMaker Open Source Edition
 * Copyright (C) 2004 - 2008 Colosa Inc.
 * *
 */

////////////////////////////////////////////////////
// pmMantisBt PM Functions
//
// Copyright (C) 2007 COLOSA
//
////////////////////////////////////////////////////
include_once(PATH_PLUGINS."pmMantis".PATH_SEP."class.pmMantis.php");

/**
 * Mantis Bug Tracker Triggers
 * @class pmMantisBt
 * @name MantisBT Triggers v. 0.1
 * @icon /plugin/pmMantisBt/mantisLogo.gif
 * @className class.pmMantisBt.pmFunctions.php
 */



/**
 * @method
 *
 * Get Sub Projects
 *
 * @name mc_project_get_all_subprojects
 * @label Get Sub Projects
 *
 * @param string | $mantisWsdlServer | Server name and port where MantisBT WSDL is accesible, including protocol | http://mantisServer:port/api/soap/mantisconnect.php?wsdl
 * @param string | $user | Valid User
 * @param string | $password | Password to authenticate user
 * @param string | $projectId | Parent Project ID 
 *
 * @return string | $result | Response
 *
 */
function mc_project_get_all_subprojects($mantisWsdlServer, $user, $password, $projectId){
    $pmMantis=new pmMantisBtClass($mantisWsdlServer,$user,$password);

    $projects=$pmMantis->mc_project_get_all_subprojects($projectId);    
    return $projects;     
}

/**
 * @method
 *
 * Get all projects that are accesible by a user
 *
 * @name mc_projects_get_user_accessible
 * @label Get all projects that are accesible by a user
 *
 * @param string | $mantisWsdlServer | Server name and port where MantisBT WSDL is accesible, including protocol | http://mantisServer:port/api/soap/mantisconnect.php?wsdl
 * @param string | $user | Valid User
 * @param string | $password | Password to authenticate user
 *
 * @return string | $result | Response
 *
 */
function mc_projects_get_user_accessible($mantisWsdlServer, $user, $password){
    $pmMantis=new pmMantisBtClass($mantisWsdlServer,$user,$password);
    
    $projects=$pmMantis->mc_projects_get_user_accessible();
    return $projects;     
}
