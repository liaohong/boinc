<?
require_once("docutil.php");
page_head("The BOINC scheduling server protocol");
echo "

<h3>Protocol nucleus</h3>
<p>
The core client communicates with scheduling servers using HTTP.
The following 'nucleus' of the protocol should be considered immutable.
This will allow any version of the core client to talk to
any version of the scheduling server,
and for the server, if needed,
to tell the core client that it's out of date.
The form of the request is:</p>
<pre>
&lt;scheduler_request&gt;
    &lt;platform&gt;intel-linux&lt;/platform&gt;
    &lt;core_client_major_version&gt;1&lt;/core_client_major_version&gt;
    &lt;core_client_minor_version&gt;1&lt;/core_client_minor_version&gt;
    ... other elements
&lt;/scheduler_request&gt;
</pre>
The 'platform' and 'version_num' elements identify the
version of the core client originating the request.

<p>
The form of the reply is:
<pre>
&lt;scheduler_reply&gt;
    [ &lt;message priority='low'&gt; arbitrary text &lt;/message&gt; ... ]
    [ &lt;request_delay&gt;3600&lt;/request_delay&gt; ]
    [ &lt;redirect&gt;URL&lt;/redirect&gt; ]
    ... other elements
&lt;/scheduler_reply&gt;
</pre>

<p>
Each <b>message</b> element is a message to the participant.
<ul>
<li>
If the priority is 'high', the core client should try
to ensure that the participant sees the message;
for example, by displaying it in a popup window.
It should not, however, wait for user input, as this
could starve other projects.
This should be reserved for situations where definitive action
is required, e.g. the user must download a new version of the
core client in order to continue participating in this project.
<li>
If the priority is 'low' (default) the core client should
allow the participant to see the message, but should not require it.
For example, it could the message to a log file.
</ul>
<p>
A reply message can contain multiple message elements.
<p>
A <b>request_delay</b> element instructs the client
to not issue another request until the indicated number
of seconds has elapsed.
<p>
A <b>redirect</b> element gives the URL for a scheduling
server for this project.
If present, the core client should replace its list
of scheduling servers for this project.
The reply may contain multiple <b>redirect</b> elements.

<h3>Extensible protocol</h3>
<p>
The remaining protocol may evolve over time.
Request elements include
<pre>
&lt;prefs_mod_time&gt;0&lt;/prefs_mod_time&gt;
&lt;authenticator&gt;3f7b90793a0175ad0bda68684e8bd136&lt;/authenticator&gt;
&lt;hostid&gt;1&lt;/hostid&gt;
&lt;work_req_seconds&gt;1000&lt;/work_req_seconds&gt;
&lt;host_info&gt;
    &lt;timezone&gt;28800&lt;/timezone&gt;
    &lt;domain_name&gt;localhost.localdomain&lt;/domain_name&gt;
    &lt;ip_addr&gt;127.0.0.1&lt;/ip_addr&gt;
    &lt;conn_frac&gt;0.000000&lt;/conn_frac&gt;
    &lt;on_frac&gt;0.000000&lt;/on_frac&gt;
    &lt;p_ncpus&gt;1&lt;/p_ncpus&gt;
    &lt;p_vendor&gt;GenuineIntel&lt;/p_vendor&gt;
    &lt;p_model&gt;Pentium&lt;/p_model&gt;
    &lt;p_fpops&gt;0.000000&lt;/p_fpops&gt;
    &lt;p_iops&gt;0.000000&lt;/p_iops&gt;
    &lt;p_membw&gt;0.000000&lt;/p_membw&gt;
    &lt;p_calculated&gt;0.000000&lt;/p_calculated&gt;
    &lt;os_name&gt;Linux&lt;/os_name&gt;
    &lt;os_version&gt;2.2.14-5.0&lt;/os_version&gt;
    &lt;m_nbytes&gt;197427200.000000&lt;/m_nbytes&gt;
    &lt;m_cache&gt;131072.000000&lt;/m_cache&gt;
    &lt;m_swap&gt;178012160.000000&lt;/m_swap&gt;
    &lt;d_total&gt;22108344320.000000&lt;/d_total&gt;
    &lt;d_free&gt;18332545024.000000&lt;/d_free&gt;
    &lt;n_bwup&gt;0.000000&lt;/n_bwup&gt;
    &lt;n_bwdown&gt;0.000000&lt;/n_bwdown&gt;
&lt;/host_info&gt;
&lt;result&gt;
    &lt;name&gt;uc_wu_0&lt;/name&gt;
    &lt;client_state&gt;4&lt;/client_state&gt;
    &lt;final_cpu_time&gt;0.020000&lt;/final_cpu_time&gt;
    &lt;stderr_out&gt;
    The following fields are used to report errors to the server, They
    are not present if there is no error while downloading, computing
    or uploading files for this result.
    [ &lt;message&gt; some text describing the error &lt;/message&gt;]   ]
    The state of the active_task assigned to compute this result at
    the time of the error
    [ &lt;active_task_state&gt;0&lt;/active_task_state&gt; ]
    The exit_status of the application running the computation for the result
    [ &lt;exit_status&gt;0&lt;/exit_status&gt; ]
    The signal raised by the application if any.
    [ &lt;signal&gt;0&lt;/signal&gt; ]
    If the error corresponds to downloading input files for the
    work_unit for this result, then:
    &lt;download_error&gt;
        &lt;file_name&gt;input&lt;/file_name&gt;
	&lt;error_code&gt;-114&lt;/error_code&gt;
    &lt;/download_error&gt;
    If the error corresponds to uploading outfiles for this results
    then:
    &lt;upload_error&gt;
        &lt;file_name&gt;output&lt;/file_name&gt;
	&lt;error_code&gt;-114&lt;/error_code&gt;
    &lt;/upload_error&gt;
    the std_err output of the application, if any, goes here.
    &lt;/stderr_out&gt; 
    &lt;file_info&gt;
        &lt;file_name&gt;uc_wu_0_0&lt;/file_name&gt;
        &lt;md5_cksum&gt;3f7b90793a0175ad0bda68684e8bd136&lt;/md5_cksum&gt;
	&lt;nbytes&gt;54691.0000000&lt;/nbytes&gt;
	&lt;max_nbytes&gt;1000000.00000&lt;/max_nbytes&gt;
	&lt;url&gt;http://localhost/hamid_cgi/test/file_upload_handler&lt;/url&gt;
    &lt;/file_info&gt;
&lt;/result&gt;
</pre>

<p>
Reply elements include
<pre>
&lt;request_delay&gt;10&lt;/request_delay&gt;
&lt;message priority='low'&gt;no work available&lt;/message&gt;
&lt;code_sign_key&gt;
    1024
    ec8b7f60fa494ce65d70afa98f91f2ab08fb5fac3931a27524e0eb954d587846
    29e94ce79d61f4d4bc4f9660578a06e941ca271646f11ef4d2be67f4a155e0a9
    9908b6c814d08f0f59e9dc85afcc9d65f89a33d329d963e3fd359351ee25ca7f
    71c3bd49a88ae609152559984b3fd7cdc4937d416a43c3357a59e7ed6cf3d30d
    0000000000000000000000000000000000000000000000000000000000000000
    0000000000000000000000000000000000000000000000000000000000000000
    0000000000000000000000000000000000000000000000000000000000000000
    0000000000000000000000000000000000000000000000000000000000010001
    .
&lt;/code_sign_key&gt;
&lt;prefs_mod_time&gt;123123&lt;/prefs_mod_time&gt;
&lt;preferences&gt;
    &lt;low_water_days&gt;1.2&lt;/low_water_days&gt;
    &lt;high_water_days&gt;2.5&lt;/high_water_days&gt;
    &lt;disk_max_used_gb&gt;0.4&lt;/disk_max_used_gb&gt;
    &lt;disk_max_used_pct&gt;50&lt;/disk_max_used_pct&gt;
    &lt;disk_min_free_gb&gt;0.4&lt;/disk_min_free_gb&gt;
    &lt;project&gt;
        &lt;master_url&gt;http://localhost.localdomain&lt;/master_url&gt;
        &lt;email_addr&gt;david@localdomain&lt;/email_addr&gt;
        &lt;authenticator&gt;123892398&lt;/authenticator&gt;
        &lt;resource_share&gt;10&lt;/resource_share&gt;
        &lt;project_specific&gt;
            &lt;color-scheme&gt;Tahiti Sunset&lt;/color-scheme&gt;
        &lt;/project_specific&gt;
    &lt;/project&gt;
&lt;/preferences&gt;
&lt;result_ack&gt;
    &lt;name&gt;uc_wu_0&lt;/name&gt;
&lt;/result_ack&gt;
</pre>
";
page_tail();
?>
