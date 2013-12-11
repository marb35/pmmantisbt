<?php

/**
 * class.pmMantisBt.php
 *
 */

class ObjectRef {

    var $id; //integer
    var $name; //string

}

class AccountData {

    var $id; //integer
    var $name; //string
    var $real_name; //string
    var $email; //string

}

class AttachmentData {

    var $id; //integer
    var $filename; //string
    var $size; //integer
    var $content_type; //string
    var $date_submitted; //dateTime
    var $download_url; //anyURI

}

class ProjectAttachmentData {

    var $id; //integer
    var $filename; //string
    var $title; //string
    var $description; //string
    var $size; //integer
    var $content_type; //string
    var $date_submitted; //dateTime
    var $download_url; //anyURI

}

class RelationshipData {

    var $id; //integer
    var $type; //ObjectRef
    var $target_id; //integer

}

class IssueNoteData {

    var $id; //integer
    var $reporter; //AccountData
    var $text; //string
    var $view_state; //ObjectRef
    var $date_submitted; //dateTime
    var $last_modified; //dateTime
    var $time_tracking; //integer

}

class IssueData {

    var $id; //integer
    var $view_state; //ObjectRef
    var $last_updated; //dateTime
    var $project; //ObjectRef
    var $category; //string
    var $priority; //ObjectRef
    var $severity; //ObjectRef
    var $status; //ObjectRef
    var $reporter; //AccountData
    var $summary; //string
    var $version; //string
    var $build; //string
    var $platform; //string
    var $os; //string
    var $os_build; //string
    var $reproducibility; //ObjectRef
    var $date_submitted; //dateTime
    var $sponsorship_total; //integer
    var $handler; //AccountData
    var $projection; //ObjectRef
    var $eta; //ObjectRef
    var $resolution; //ObjectRef
    var $fixed_in_version; //string
    var $target_version; //string
    var $description; //string
    var $steps_to_reproduce; //string
    var $additional_information; //string
    var $attachments; //AttachmentDataArray
    var $relationships; //RelationshipDataArray
    var $notes; //IssueNoteDataArray
    var $custom_fields; //CustomFieldValueForIssueDataArray
    var $due_date; //dateTime

}

class IssueHeaderData {

    var $id; //integer
    var $view_state; //integer
    var $last_updated; //dateTime
    var $project; //integer
    var $category; //string
    var $priority; //integer
    var $severity; //integer
    var $status; //integer
    var $reporter; //integer
    var $summary; //string
    var $handler; //integer
    var $resolution; //integer
    var $attachments_count; //integer
    var $notes_count; //integer

}

class ProjectData {

    var $id; //integer
    var $name; //string
    var $status; //ObjectRef
    var $enabled; //boolean
    var $view_state; //ObjectRef
    var $access_min; //ObjectRef
    var $file_path; //string
    var $description; //string
    var $subprojects; //ProjectDataArray
    var $inherit_global; //boolean

}

class ProjectVersionData {

    var $id; //integer
    var $name; //string
    var $project_id; //integer
    var $date_order; //dateTime
    var $description; //string
    var $released; //boolean

}

class FilterData {

    var $id; //integer
    var $owner; //AccountData
    var $project_id; //integer
    var $is_public; //boolean
    var $name; //string
    var $filter_string; //string

}

class CustomFieldDefinitionData {

    var $field; //ObjectRef
    var $type; //integer
    var $possible_values; //string
    var $default_value; //string
    var $valid_regexp; //string
    var $access_level_r; //integer
    var $access_level_rw; //integer
    var $length_min; //integer
    var $length_max; //integer
    var $advanced; //boolean
    var $display_report; //boolean
    var $display_update; //boolean
    var $display_resolved; //boolean
    var $display_closed; //boolean
    var $require_report; //boolean
    var $require_update; //boolean
    var $require_resolved; //boolean
    var $require_closed; //boolean

}

class CustomFieldLinkForProjectData {

    var $field; //ObjectRef
    var $sequence; //byte

}

class CustomFieldValueForIssueData {

    var $field; //ObjectRef
    var $value; //string

}

class pmMantisBtClass extends PMPlugin {
    var $soapClient;


    function setup()
    {

    }

    private static $classmap = array('ObjectRef' => 'ObjectRef'
            , 'AccountData' => 'AccountData'
            , 'AttachmentData' => 'AttachmentData'
            , 'ProjectAttachmentData' => 'ProjectAttachmentData'
            , 'RelationshipData' => 'RelationshipData'
            , 'IssueNoteData' => 'IssueNoteData'
            , 'IssueData' => 'IssueData'
            , 'IssueHeaderData' => 'IssueHeaderData'
            , 'ProjectData' => 'ProjectData'
            , 'ProjectVersionData' => 'ProjectVersionData'
            , 'FilterData' => 'FilterData'
            , 'CustomFieldDefinitionData' => 'CustomFieldDefinitionData'
            , 'CustomFieldLinkForProjectData' => 'CustomFieldLinkForProjectData'
            , 'CustomFieldValueForIssueData' => 'CustomFieldValueForIssueData'
    );

    function __construct($url='http://bugs.processmaker.com/api/soap/mantisconnect.php?wsdl',$username,$password)
    {
        set_include_path(
                PATH_PLUGINS . 'pmMantisBt' . PATH_SEPARATOR .
                get_include_path()
        );
        $this->username=$username;
        $this->password=$password;
        $this->soapClient = new SoapClient($url, array("classmap" => self::$classmap, "trace" => true, "exceptions" => true));
    }

    function mc_version()
    {

        $string = $this->soapClient->mc_version();
        return $string;
    }

    function mc_enum_status($string)
    {

        $ObjectRefArray = $this->soapClient->mc_enum_status($string);
        return $ObjectRefArray;
    }

    function mc_enum_priorities($string)
    {

        $ObjectRefArray = $this->soapClient->mc_enum_priorities($string);
        return $ObjectRefArray;
    }

    function mc_enum_severities($string)
    {

        $ObjectRefArray = $this->soapClient->mc_enum_severities($string);
        return $ObjectRefArray;
    }

    function mc_enum_reproducibilities($string)
    {

        $ObjectRefArray = $this->soapClient->mc_enum_reproducibilities($string);
        return $ObjectRefArray;
    }

    function mc_enum_projections($string)
    {

        $ObjectRefArray = $this->soapClient->mc_enum_projections($string);
        return $ObjectRefArray;
    }

    function mc_enum_etas($string)
    {

        $ObjectRefArray = $this->soapClient->mc_enum_etas($string);
        return $ObjectRefArray;
    }

    function mc_enum_resolutions($string)
    {

        $ObjectRefArray = $this->soapClient->mc_enum_resolutions($string);
        return $ObjectRefArray;
    }

    function mc_enum_access_levels($string)
    {

        $ObjectRefArray = $this->soapClient->mc_enum_access_levels($string);
        return $ObjectRefArray;
    }

    function mc_enum_project_status($string)
    {

        $ObjectRefArray = $this->soapClient->mc_enum_project_status($string);
        return $ObjectRefArray;
    }

    function mc_enum_project_view_states($string)
    {

        $ObjectRefArray = $this->soapClient->mc_enum_project_view_states($string);
        return $ObjectRefArray;
    }

    function mc_enum_view_states($string)
    {

        $ObjectRefArray = $this->soapClient->mc_enum_view_states($string);
        return $ObjectRefArray;
    }

    function mc_enum_custom_field_types($string)
    {

        $ObjectRefArray = $this->soapClient->mc_enum_custom_field_types($string);
        return $ObjectRefArray;
    }

    function mc_enum_get($string)
    {

        $string = $this->soapClient->mc_enum_get($string);
        return $string;
    }

    function mc_issue_exists($string)
    {

        $boolean = $this->soapClient->mc_issue_exists($string);
        return $boolean;
    }

    function mc_issue_get($issueId)
    {

        $IssueData = $this->soapClient->mc_issue_get($this->username,$this->password,$issueId);
        return $IssueData;
    }

    function mc_issue_get_biggest_id($string)
    {

        $integer = $this->soapClient->mc_issue_get_biggest_id($string);
        return $integer;
    }

    function mc_issue_get_id_from_summary($string)
    {

        $integer = $this->soapClient->mc_issue_get_id_from_summary($string);
        return $integer;
    }

    function mc_issue_add($string)
    {

        $integer = $this->soapClient->mc_issue_add($string);
        return $integer;
    }

    function mc_issue_update($string)
    {

        $boolean = $this->soapClient->mc_issue_update($string);
        return $boolean;
    }

    function mc_issue_delete($string)
    {

        $boolean = $this->soapClient->mc_issue_delete($string);
        return $boolean;
    }

    function mc_issue_note_add($string)
    {

        $integer = $this->soapClient->mc_issue_note_add($string);
        return $integer;
    }

    function mc_issue_note_delete($string)
    {

        $boolean = $this->soapClient->mc_issue_note_delete($string);
        return $boolean;
    }

    function mc_issue_relationship_add($string)
    {

        $integer = $this->soapClient->mc_issue_relationship_add($string);
        return $integer;
    }

    function mc_issue_relationship_delete($string)
    {

        $boolean = $this->soapClient->mc_issue_relationship_delete($string);
        return $boolean;
    }

    function mc_issue_attachment_add($string)
    {

        $integer = $this->soapClient->mc_issue_attachment_add($string);
        return $integer;
    }

    function mc_issue_attachment_delete($string)
    {

        $boolean = $this->soapClient->mc_issue_attachment_delete($string);
        return $boolean;
    }

    function mc_issue_attachment_get($string)
    {

        $base64Binary = $this->soapClient->mc_issue_attachment_get($string);
        return $base64Binary;
    }

    function mc_project_add($string)
    {

        $integer = $this->soapClient->mc_project_add($string);
        return $integer;
    }

    function mc_project_delete($string)
    {

        $boolean = $this->soapClient->mc_project_delete($string);
        return $boolean;
    }

    function mc_project_update($string)
    {

        $boolean = $this->soapClient->mc_project_update($string);
        return $boolean;
    }

    function mc_project_get_id_from_name($string)
    {

        $integer = $this->soapClient->mc_project_get_id_from_name($string);
        return $integer;
    }

    function mc_project_get_issues($projectId,$page,$limit)
    {

        $IssueDataArray = $this->soapClient->mc_project_get_issues($this->username,$this->password,$projectId,$page,$limit);
        return $IssueDataArray;
    }

    function mc_project_get_issue_headers($string)
    {

        $IssueHeaderDataArray = $this->soapClient->mc_project_get_issue_headers($string);
        return $IssueHeaderDataArray;
    }

    function mc_project_get_users($string)
    {

        $AccountDataArray = $this->soapClient->mc_project_get_users($string);
        return $AccountDataArray;
    }

    function mc_projects_get_user_accessible()
    {

        $ProjectDataArray = $this->soapClient->mc_projects_get_user_accessible($this->username,$this->password);
        return $ProjectDataArray;
    }

    function mc_project_get_categories($string)
    {

        $StringArray = $this->soapClient->mc_project_get_categories($string);
        return $StringArray;
    }

    function mc_project_add_category($string)
    {

        $integer = $this->soapClient->mc_project_add_category($string);
        return $integer;
    }

    function mc_project_delete_category($string)
    {

        $integer = $this->soapClient->mc_project_delete_category($string);
        return $integer;
    }

    function mc_project_rename_category_by_name($string)
    {

        $integer = $this->soapClient->mc_project_rename_category_by_name($string);
        return $integer;
    }

    function mc_project_get_versions($string)
    {

        $ProjectVersionDataArray = $this->soapClient->mc_project_get_versions($string);
        return $ProjectVersionDataArray;
    }

    function mc_project_version_add($string)
    {

        $integer = $this->soapClient->mc_project_version_add($string);
        return $integer;
    }

    function mc_project_version_update($string)
    {

        $boolean = $this->soapClient->mc_project_version_update($string);
        return $boolean;
    }

    function mc_project_version_delete($string)
    {

        $boolean = $this->soapClient->mc_project_version_delete($string);
        return $boolean;
    }

    function mc_project_get_released_versions($string)
    {

        $ProjectVersionDataArray = $this->soapClient->mc_project_get_released_versions($string);
        return $ProjectVersionDataArray;
    }

    function mc_project_get_unreleased_versions($string)
    {

        $ProjectVersionDataArray = $this->soapClient->mc_project_get_unreleased_versions($string);
        return $ProjectVersionDataArray;
    }

    function mc_project_get_attachments($string)
    {

        $ProjectAttachmentDataArray = $this->soapClient->mc_project_get_attachments($string);
        return $ProjectAttachmentDataArray;
    }

    function mc_project_get_custom_fields($string)
    {

        $CustomFieldDefinitionDataArray = $this->soapClient->mc_project_get_custom_fields($string);
        return $CustomFieldDefinitionDataArray;
    }

    function mc_project_attachment_get($string)
    {

        $base64Binary = $this->soapClient->mc_project_attachment_get($string);
        return $base64Binary;
    }

    function mc_project_attachment_add($string)
    {

        $integer = $this->soapClient->mc_project_attachment_add($string);
        return $integer;
    }

    function mc_project_attachment_delete($string)
    {

        $boolean = $this->soapClient->mc_project_attachment_delete($string);
        return $boolean;
    }

    function mc_project_get_all_subprojects($projectId)
    {

        $StringArray = $this->soapClient->mc_project_get_all_subprojects($this->username,$this->password,$projectId);
        return $StringArray;
    }

    function mc_filter_get($string)
    {

        $FilterDataArray = $this->soapClient->mc_filter_get($string);
        return $FilterDataArray;
    }

    function mc_filter_get_issues($string)
    {

        $IssueDataArray = $this->soapClient->mc_filter_get_issues($string);
        return $IssueDataArray;
    }

    function mc_filter_get_issue_headers($string)
    {

        $IssueHeaderDataArray = $this->soapClient->mc_filter_get_issue_headers($string);
        return $IssueHeaderDataArray;
    }

    function mc_config_get_string($string)
    {

        $string = $this->soapClient->mc_config_get_string($string);
        return $string;
    }

    function mc_issue_checkin($string)
    {
        $boolean = $this->soapClient->mc_issue_checkin($string);
        return $boolean;
    }
}