<?php 
 $GLOBALS["dictionary"]["Call"]=array (
  'table' => 'calls',
  'comment' => 'A Call is an activity representing a phone call',
  'unified_search' => true,
  'full_text_search' => true,
  'unified_search_default_enabled' => true,
  'fields' => 
  array (
    'id' => 
    array (
      'name' => 'id',
      'vname' => 'LBL_ID',
      'type' => 'id',
      'required' => true,
      'reportable' => true,
      'comment' => 'Unique identifier',
      'inline_edit' => false,
    ),
    'name' => 
    array (
      'name' => 'name',
      'vname' => 'LBL_SUBJECT',
      'dbType' => 'varchar',
      'type' => 'name',
      'len' => '50',
      'comment' => 'Brief description of the call',
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 3,
      ),
      'required' => true,
      'importable' => 'required',
    ),
    'date_entered' => 
    array (
      'name' => 'date_entered',
      'vname' => 'LBL_DATE_ENTERED',
      'type' => 'datetime',
      'group' => 'created_by_name',
      'comment' => 'Date record created',
      'enable_range_search' => true,
      'options' => 'date_range_search_dom',
      'inline_edit' => false,
    ),
    'date_modified' => 
    array (
      'name' => 'date_modified',
      'vname' => 'LBL_DATE_MODIFIED',
      'type' => 'datetime',
      'group' => 'modified_by_name',
      'comment' => 'Date record last modified',
      'enable_range_search' => true,
      'options' => 'date_range_search_dom',
      'inline_edit' => false,
    ),
    'modified_user_id' => 
    array (
      'name' => 'modified_user_id',
      'rname' => 'user_name',
      'id_name' => 'modified_user_id',
      'vname' => 'LBL_MODIFIED',
      'type' => 'assigned_user_name',
      'table' => 'users',
      'isnull' => 'false',
      'group' => 'modified_by_name',
      'dbType' => 'id',
      'reportable' => true,
      'comment' => 'User who last modified record',
      'massupdate' => false,
      'inline_edit' => false,
    ),
    'modified_by_name' => 
    array (
      'name' => 'modified_by_name',
      'vname' => 'LBL_MODIFIED_NAME',
      'type' => 'relate',
      'reportable' => false,
      'source' => 'non-db',
      'rname' => 'user_name',
      'table' => 'users',
      'id_name' => 'modified_user_id',
      'module' => 'Users',
      'link' => 'modified_user_link',
      'duplicate_merge' => 'disabled',
      'massupdate' => false,
      'inline_edit' => false,
    ),
    'created_by' => 
    array (
      'name' => 'created_by',
      'rname' => 'user_name',
      'id_name' => 'modified_user_id',
      'vname' => 'LBL_CREATED',
      'type' => 'assigned_user_name',
      'table' => 'users',
      'isnull' => 'false',
      'dbType' => 'id',
      'group' => 'created_by_name',
      'comment' => 'User who created record',
      'massupdate' => false,
      'inline_edit' => false,
    ),
    'created_by_name' => 
    array (
      'name' => 'created_by_name',
      'vname' => 'LBL_CREATED',
      'type' => 'relate',
      'reportable' => false,
      'link' => 'created_by_link',
      'rname' => 'user_name',
      'source' => 'non-db',
      'table' => 'users',
      'id_name' => 'created_by',
      'module' => 'Users',
      'duplicate_merge' => 'disabled',
      'importable' => 'false',
      'massupdate' => false,
      'inline_edit' => false,
    ),
    'description' => 
    array (
      'name' => 'description',
      'vname' => 'LBL_DESCRIPTION',
      'type' => 'text',
      'comment' => 'Full text of the note',
      'rows' => 6,
      'cols' => 80,
    ),
    'deleted' => 
    array (
      'name' => 'deleted',
      'vname' => 'LBL_DELETED',
      'type' => 'bool',
      'default' => '0',
      'reportable' => false,
      'comment' => 'Record deletion indicator',
    ),
    'created_by_link' => 
    array (
      'name' => 'created_by_link',
      'type' => 'link',
      'relationship' => 'calls_created_by',
      'vname' => 'LBL_CREATED_BY_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
    ),
    'modified_user_link' => 
    array (
      'name' => 'modified_user_link',
      'type' => 'link',
      'relationship' => 'calls_modified_user',
      'vname' => 'LBL_MODIFIED_BY_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
    ),
    'assigned_user_id' => 
    array (
      'name' => 'assigned_user_id',
      'rname' => 'user_name',
      'id_name' => 'assigned_user_id',
      'vname' => 'LBL_ASSIGNED_TO_ID',
      'group' => 'assigned_user_name',
      'type' => 'relate',
      'table' => 'users',
      'module' => 'Users',
      'reportable' => true,
      'isnull' => 'false',
      'dbType' => 'id',
      'audited' => true,
      'comment' => 'User ID assigned to record',
      'duplicate_merge' => 'disabled',
    ),
    'assigned_user_name' => 
    array (
      'name' => 'assigned_user_name',
      'link' => 'assigned_user_link',
      'vname' => 'LBL_ASSIGNED_TO_NAME',
      'rname' => 'user_name',
      'type' => 'relate',
      'reportable' => false,
      'source' => 'non-db',
      'table' => 'users',
      'id_name' => 'assigned_user_id',
      'module' => 'Users',
      'duplicate_merge' => 'disabled',
    ),
    'assigned_user_link' => 
    array (
      'name' => 'assigned_user_link',
      'type' => 'link',
      'relationship' => 'calls_assigned_user',
      'vname' => 'LBL_ASSIGNED_TO_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
    ),
    'SecurityGroups' => 
    array (
      'name' => 'SecurityGroups',
      'type' => 'link',
      'relationship' => 'securitygroups_calls',
      'module' => 'SecurityGroups',
      'bean_name' => 'SecurityGroup',
      'source' => 'non-db',
      'vname' => 'LBL_SECURITYGROUPS',
    ),
    'duration_hours' => 
    array (
      'name' => 'duration_hours',
      'vname' => 'LBL_DURATION_HOURS',
      'type' => 'int',
      'len' => '2',
      'comment' => 'Call duration, hours portion',
      'required' => true,
    ),
    'duration_minutes' => 
    array (
      'name' => 'duration_minutes',
      'vname' => 'LBL_DURATION_MINUTES',
      'type' => 'int',
      'function' => 
      array (
        'name' => 'getDurationMinutesOptions',
        'returns' => 'html',
        'include' => 'modules/Calls/CallHelper.php',
      ),
      'len' => '2',
      'group' => 'duration_hours',
      'importable' => 'required',
      'comment' => 'Call duration, minutes portion',
    ),
    'date_start' => 
    array (
      'name' => 'date_start',
      'vname' => 'LBL_DATE',
      'type' => 'datetimecombo',
      'dbType' => 'datetime',
      'comment' => 'Date in which call is schedule to (or did) start',
      'importable' => 'required',
      'required' => true,
      'enable_range_search' => true,
      'options' => 'date_range_search_dom',
    ),
    'date_end' => 
    array (
      'name' => 'date_end',
      'vname' => 'LBL_DATE_END',
      'type' => 'datetimecombo',
      'dbType' => 'datetime',
      'massupdate' => false,
      'comment' => 'Date is which call is scheduled to (or did) end',
      'enable_range_search' => true,
      'options' => 'date_range_search_dom',
    ),
    'parent_type' => 
    array (
      'name' => 'parent_type',
      'vname' => 'LBL_PARENT_TYPE',
      'type' => 'parent_type',
      'dbType' => 'varchar',
      'required' => false,
      'group' => 'parent_name',
      'options' => 'parent_type_display',
      'len' => 255,
      'comment' => 'The Sugar object to which the call is related',
    ),
    'parent_name' => 
    array (
      'name' => 'parent_name',
      'parent_type' => 'record_type_display',
      'type_name' => 'parent_type',
      'id_name' => 'parent_id',
      'vname' => 'LBL_LIST_RELATED_TO',
      'type' => 'parent',
      'group' => 'parent_name',
      'source' => 'non-db',
      'options' => 'parent_type_display',
    ),
    'status' => 
    array (
      'name' => 'status',
      'vname' => 'LBL_STATUS',
      'type' => 'enum',
      'len' => 100,
      'options' => 'call_status_dom',
      'comment' => 'The status of the call (Held, Not Held, etc.)',
      'required' => true,
      'importable' => 'required',
      'default' => 'Planned',
      'studio' => 
      array (
        'detailview' => false,
      ),
    ),
    'direction' => 
    array (
      'name' => 'direction',
      'vname' => 'LBL_DIRECTION',
      'type' => 'enum',
      'len' => 100,
      'options' => 'call_direction_dom',
      'comment' => 'Indicates whether call is inbound or outbound',
    ),
    'parent_id' => 
    array (
      'name' => 'parent_id',
      'vname' => 'LBL_LIST_RELATED_TO_ID',
      'type' => 'id',
      'group' => 'parent_name',
      'reportable' => false,
      'comment' => 'The ID of the parent Sugar object identified by parent_type',
    ),
    'reminder_checked' => 
    array (
      'name' => 'reminder_checked',
      'vname' => 'LBL_REMINDER',
      'type' => 'bool',
      'source' => 'non-db',
      'comment' => 'checkbox indicating whether or not the reminder value is set (Meta-data only)',
      'massupdate' => false,
      'studio' => false,
    ),
    'reminder_time' => 
    array (
      'name' => 'reminder_time',
      'vname' => 'LBL_REMINDER_TIME',
      'type' => 'enum',
      'dbType' => 'int',
      'options' => 'reminder_time_options',
      'reportable' => false,
      'massupdate' => false,
      'default' => -1,
      'comment' => 'Specifies when a reminder alert should be issued; -1 means no alert; otherwise the number of seconds prior to the start',
      'studio' => false,
    ),
    'email_reminder_checked' => 
    array (
      'name' => 'email_reminder_checked',
      'vname' => 'LBL_EMAIL_REMINDER',
      'type' => 'bool',
      'source' => 'non-db',
      'comment' => 'checkbox indicating whether or not the email reminder value is set (Meta-data only)',
      'massupdate' => false,
      'studio' => false,
    ),
    'email_reminder_time' => 
    array (
      'name' => 'email_reminder_time',
      'vname' => 'LBL_EMAIL_REMINDER_TIME',
      'type' => 'enum',
      'dbType' => 'int',
      'options' => 'reminder_time_options',
      'reportable' => false,
      'massupdate' => false,
      'default' => -1,
      'comment' => 'Specifies when a email reminder alert should be issued; -1 means no alert; otherwise the number of seconds prior to the start',
      'studio' => false,
    ),
    'email_reminder_sent' => 
    array (
      'name' => 'email_reminder_sent',
      'vname' => 'LBL_EMAIL_REMINDER_SENT',
      'default' => 0,
      'type' => 'bool',
      'comment' => 'Whether email reminder is already sent',
      'studio' => false,
      'massupdate' => false,
    ),
    'reminders' => 
    array (
      'required' => false,
      'name' => 'reminders',
      'vname' => 'LBL_REMINDER',
      'type' => 'function',
      'source' => 'non-db',
      'massupdate' => 0,
      'importable' => 'false',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => 0,
      'audited' => false,
      'reportable' => false,
      'function' => 
      array (
        'name' => 'Reminder::getRemindersListView',
        'returns' => 'html',
        'include' => 'modules/Reminders/Reminder.php',
      ),
    ),
    'outlook_id' => 
    array (
      'name' => 'outlook_id',
      'vname' => 'LBL_OUTLOOK_ID',
      'type' => 'varchar',
      'len' => '255',
      'reportable' => false,
      'comment' => 'When the Sugar Plug-in for Microsoft Outlook syncs an Outlook appointment, this is the Outlook appointment item ID',
    ),
    'accept_status' => 
    array (
      'name' => 'accept_status',
      'vname' => 'LBL_ACCEPT_STATUS',
      'dbType' => 'varchar',
      'type' => 'varchar',
      'len' => '20',
      'source' => 'non-db',
    ),
    'set_accept_links' => 
    array (
      'name' => 'accept_status',
      'vname' => 'LBL_ACCEPT_LINK',
      'dbType' => 'varchar',
      'type' => 'varchar',
      'len' => '20',
      'source' => 'non-db',
    ),
    'contact_name' => 
    array (
      'name' => 'contact_name',
      'rname' => 'last_name',
      'db_concat_fields' => 
      array (
        0 => 'first_name',
        1 => 'last_name',
      ),
      'id_name' => 'contact_id',
      'massupdate' => false,
      'vname' => 'LBL_CONTACT_NAME',
      'type' => 'relate',
      'link' => 'contacts',
      'table' => 'contacts',
      'isnull' => 'true',
      'module' => 'Contacts',
      'join_name' => 'contacts',
      'dbType' => 'varchar',
      'source' => 'non-db',
      'len' => 36,
      'importable' => 'false',
      'studio' => 
      array (
        'required' => false,
        'listview' => true,
        'visible' => false,
      ),
    ),
    'opportunities' => 
    array (
      'name' => 'opportunities',
      'type' => 'link',
      'relationship' => 'opportunity_calls',
      'source' => 'non-db',
      'link_type' => 'one',
      'vname' => 'LBL_OPPORTUNITY',
    ),
    'leads' => 
    array (
      'name' => 'leads',
      'type' => 'link',
      'relationship' => 'calls_leads',
      'source' => 'non-db',
      'vname' => 'LBL_LEADS',
    ),
    'project' => 
    array (
      'name' => 'project',
      'type' => 'link',
      'relationship' => 'projects_calls',
      'source' => 'non-db',
      'vname' => 'LBL_PROJECTS',
    ),
    'case' => 
    array (
      'name' => 'case',
      'type' => 'link',
      'relationship' => 'case_calls',
      'source' => 'non-db',
      'link_type' => 'one',
      'vname' => 'LBL_CASE',
    ),
    'accounts' => 
    array (
      'name' => 'accounts',
      'type' => 'link',
      'relationship' => 'account_calls',
      'module' => 'Accounts',
      'bean_name' => 'Account',
      'source' => 'non-db',
      'vname' => 'LBL_ACCOUNT',
    ),
    'contacts' => 
    array (
      'name' => 'contacts',
      'type' => 'link',
      'relationship' => 'calls_contacts',
      'source' => 'non-db',
      'vname' => 'LBL_CONTACTS',
    ),
    'aos_contracts' => 
    array (
      'name' => 'aos_contracts',
      'type' => 'link',
      'relationship' => 'aos_contracts_calls',
      'source' => 'non-db',
      'vname' => 'LBL_CONTRACT',
    ),
    'users' => 
    array (
      'name' => 'users',
      'type' => 'link',
      'relationship' => 'calls_users',
      'source' => 'non-db',
      'vname' => 'LBL_USERS',
    ),
    'notes' => 
    array (
      'name' => 'notes',
      'type' => 'link',
      'relationship' => 'calls_notes',
      'module' => 'Notes',
      'bean_name' => 'Note',
      'source' => 'non-db',
      'vname' => 'LBL_NOTES',
    ),
    'contact_id' => 
    array (
      'name' => 'contact_id',
      'type' => 'id',
      'source' => 'non-db',
    ),
    'repeat_type' => 
    array (
      'name' => 'repeat_type',
      'vname' => 'LBL_REPEAT_TYPE',
      'type' => 'enum',
      'len' => 36,
      'options' => 'repeat_type_dom',
      'comment' => 'Type of recurrence',
      'importable' => 'false',
      'massupdate' => false,
      'reportable' => false,
      'studio' => 'false',
    ),
    'repeat_interval' => 
    array (
      'name' => 'repeat_interval',
      'vname' => 'LBL_REPEAT_INTERVAL',
      'type' => 'int',
      'len' => 3,
      'default' => 1,
      'comment' => 'Interval of recurrence',
      'importable' => 'false',
      'massupdate' => false,
      'reportable' => false,
      'studio' => 'false',
    ),
    'repeat_dow' => 
    array (
      'name' => 'repeat_dow',
      'vname' => 'LBL_REPEAT_DOW',
      'type' => 'varchar',
      'len' => 7,
      'comment' => 'Days of week in recurrence',
      'importable' => 'false',
      'massupdate' => false,
      'reportable' => false,
      'studio' => 'false',
    ),
    'repeat_until' => 
    array (
      'name' => 'repeat_until',
      'vname' => 'LBL_REPEAT_UNTIL',
      'type' => 'date',
      'comment' => 'Repeat until specified date',
      'importable' => 'false',
      'massupdate' => false,
      'reportable' => false,
      'studio' => 'false',
    ),
    'repeat_count' => 
    array (
      'name' => 'repeat_count',
      'vname' => 'LBL_REPEAT_COUNT',
      'type' => 'int',
      'len' => 7,
      'comment' => 'Number of recurrence',
      'importable' => 'false',
      'massupdate' => false,
      'reportable' => false,
      'studio' => 'false',
    ),
    'repeat_parent_id' => 
    array (
      'name' => 'repeat_parent_id',
      'vname' => 'LBL_REPEAT_PARENT_ID',
      'type' => 'id',
      'len' => 36,
      'comment' => 'Id of the first element of recurring records',
      'importable' => 'false',
      'massupdate' => false,
      'reportable' => false,
      'studio' => 'false',
    ),
    'recurring_source' => 
    array (
      'name' => 'recurring_source',
      'vname' => 'LBL_RECURRING_SOURCE',
      'type' => 'varchar',
      'len' => 36,
      'comment' => 'Source of recurring call',
      'importable' => false,
      'massupdate' => false,
      'reportable' => false,
      'studio' => false,
    ),
    'reschedule_history' => 
    array (
      'required' => false,
      'name' => 'reschedule_history',
      'vname' => 'LBL_RESCHEDULE_HISTORY',
      'type' => 'varchar',
      'source' => 'non-db',
      'studio' => 'visible',
      'massupdate' => 0,
      'importable' => 'false',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => 0,
      'audited' => false,
      'reportable' => false,
      'function' => 
      array (
        'name' => 'reschedule_history',
        'returns' => 'html',
        'include' => 'modules/Calls/reschedule_history.php',
      ),
    ),
    'reschedule_count' => 
    array (
      'required' => false,
      'name' => 'reschedule_count',
      'vname' => 'LBL_RESCHEDULE_COUNT',
      'type' => 'varchar',
      'source' => 'non-db',
      'studio' => 'visible',
      'massupdate' => 0,
      'importable' => 'false',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => 0,
      'audited' => false,
      'reportable' => false,
      'function' => 
      array (
        'name' => 'reschedule_count',
        'returns' => 'html',
        'include' => 'modules/Calls/reschedule_history.php',
      ),
    ),
    'calls_reschedule' => 
    array (
      'name' => 'calls_reschedule',
      'type' => 'link',
      'relationship' => 'calls_reschedule',
      'module' => 'Calls_Reschedule',
      'bean_name' => 'Calls_Reschedule',
      'source' => 'non-db',
    ),
    'allday' => 
    array (
      'name' => 'allday',
      'vname' => 'LBL_IS_ALLDAY',
      'type' => 'bool',
      'default' => 0,
      'reportable' => false,
      'massupdate' => false,
      'importable' => 'false',
      'studio' => false,
    ),
    'gevent_id' => 
    array (
      'name' => 'gevent_id',
      'rname' => 'name',
      'vname' => 'LBL_GEVENT_ID',
      'type' => 'varchar',
      'reportable' => false,
      'massupdate' => false,
      'importable' => 'false',
      'studio' => false,
    ),
    'invitee_email_addresses' => 
    array (
      'name' => 'invitee_email_addresses',
      'rname' => 'name',
      'vname' => 'LBL_INVITEE_EMAIL_ADDRESSES',
      'type' => 'text',
      'reportable' => false,
      'massupdate' => false,
      'importable' => 'false',
      'studio' => false,
    ),
    'is_gevent' => 
    array (
      'name' => 'is_gevent',
      'vname' => 'LBL_IS_GEVENT',
      'type' => 'bool',
      'default' => '0',
      'reportable' => false,
      'massupdate' => false,
      'importable' => 'false',
      'studio' => false,
    ),
  ),
  'indices' => 
  array (
    'id' => 
    array (
      'name' => 'callspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    0 => 
    array (
      'name' => 'idx_call_name',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'name',
      ),
    ),
    1 => 
    array (
      'name' => 'idx_status',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'status',
      ),
    ),
    2 => 
    array (
      'name' => 'idx_calls_date_start',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'date_start',
      ),
    ),
    3 => 
    array (
      'name' => 'idx_calls_par_del',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'parent_id',
        1 => 'parent_type',
        2 => 'deleted',
      ),
    ),
    4 => 
    array (
      'name' => 'idx_calls_assigned_del',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'deleted',
        1 => 'assigned_user_id',
      ),
    ),
  ),
  'relationships' => 
  array (
    'calls_modified_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'Calls',
      'rhs_table' => 'calls',
      'rhs_key' => 'modified_user_id',
      'relationship_type' => 'one-to-many',
    ),
    'calls_created_by' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'Calls',
      'rhs_table' => 'calls',
      'rhs_key' => 'created_by',
      'relationship_type' => 'one-to-many',
    ),
    'calls_assigned_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'Calls',
      'rhs_table' => 'calls',
      'rhs_key' => 'assigned_user_id',
      'relationship_type' => 'one-to-many',
    ),
    'securitygroups_calls' => 
    array (
      'lhs_module' => 'SecurityGroups',
      'lhs_table' => 'securitygroups',
      'lhs_key' => 'id',
      'rhs_module' => 'Calls',
      'rhs_table' => 'calls',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'securitygroups_records',
      'join_key_lhs' => 'securitygroup_id',
      'join_key_rhs' => 'record_id',
      'relationship_role_column' => 'module',
      'relationship_role_column_value' => 'Calls',
    ),
    'calls_notes' => 
    array (
      'lhs_module' => 'Calls',
      'lhs_table' => 'calls',
      'lhs_key' => 'id',
      'rhs_module' => 'Notes',
      'rhs_table' => 'notes',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'Calls',
    ),
    'calls_reschedule' => 
    array (
      'lhs_module' => 'Calls',
      'lhs_table' => 'calls',
      'lhs_key' => 'id',
      'rhs_module' => 'Calls_Reschedule',
      'rhs_table' => 'calls_reschedule',
      'rhs_key' => 'call_id',
      'relationship_type' => 'one-to-many',
    ),
  ),
  'optimistic_locking' => true,
  'templates' => 
  array (
    'security_groups' => 'security_groups',
    'assignable' => 'assignable',
    'basic' => 'basic',
  ),
  'custom_fields' => false,
);