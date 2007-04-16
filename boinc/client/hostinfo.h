// The contents of this file are subject to the BOINC Public License
// Version 1.0 (the "License"); you may not use this file except in
// compliance with the License. You may obtain a copy of the License at
// http://boinc.berkeley.edu/license_1.0.txt
//
// Software distributed under the License is distributed on an "AS IS"
// basis, WITHOUT WARRANTY OF ANY KIND, either express or implied. See the
// License for the specific language governing rights and limitations
// under the License.
//
// The Original Code is the Berkeley Open Infrastructure for Network Computing.
//
// The Initial Developer of the Original Code is the SETI@home project.
// Portions created by the SETI@home project are Copyright (C) 2002
// University of California at Berkeley. All Rights Reserved.
//
// Contributor(s):
//

#ifndef _HOSTINFO_
#define _HOSTINFO_

// Other host-specific info is kept in
// TIME_STATS (on/connected/active fractions)
// NET_STATS (average network bandwidths)

struct HOST_INFO {
    int timezone;    // seconds added to local time to get UTC
    char domain_name[256];
    char serialnum[256];
    char ip_addr[256];

    int p_ncpus;
    char p_vendor[256];
    char p_model[256];
    double p_fpops;
    double p_iops;
    double p_membw;
    int p_fpop_err;
    int p_iop_err;
    int p_membw_err;
    double p_calculated; //needs to be initialized to zero

    char os_name[256];
    char os_version[256];

    double m_nbytes;
    double m_cache;
    double m_swap;

    double d_total;
    double d_free;

    int parse(FILE*);
    int write(FILE*);
    int parse_cpu_benchmarks(FILE*);
    int write_cpu_benchmarks(FILE*);
};

extern bool host_is_running_on_batteries();

extern int get_host_info(HOST_INFO&);
extern void clear_host_info(HOST_INFO&);

extern int get_local_domain_name(char* p, int len);
extern int get_local_ip_addr_str(char* p, int len);
extern int get_local_ip_addr(int& p);

#endif
