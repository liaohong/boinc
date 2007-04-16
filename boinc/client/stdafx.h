// stdafx.h : include file for standard system include files,
// or project specific include files that are used frequently,
// but are changed infrequently

#pragma once

#ifndef _STDAFX_H_
#define _STDAFX_H_

///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
//
// Windows System Libraries
//
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
#ifdef _WIN32

// Modify the following defines if you have to target a platform prior to the ones specified below.
// Refer to MSDN for the latest info on corresponding values for different platforms.
#ifndef WINVER                  // Allow use of features specific to Windows 95 and Windows NT 4 or later.
#define WINVER 0x0400           // Change this to the appropriate value to target Windows 98 and Windows 2000 or later.
#endif

#ifndef _WIN32_WINNT            // Allow use of features specific to Windows NT 4 or later.
#define _WIN32_WINNT 0x0400		// Change this to the appropriate value to target Windows 98 and Windows 2000 or later.
#endif						

#ifndef _WIN32_WINDOWS          // Allow use of features specific to Windows 98 or later.
#define _WIN32_WINDOWS 0x0400   // Change this to the appropriate value to target Windows Me or later.
#endif

#ifndef _WIN32_IE               // Allow use of features specific to IE 4.0 or later.
#define _WIN32_IE 0x0500        // Change this to the appropriate value to target IE 5.0 or later.
#endif

//
// BOINC Windows GUI Applications use MFC libraries and the like.
//
#ifndef _CONSOLE

#ifndef VC_EXTRALEAN
#define VC_EXTRALEAN
#endif

#include <afxwin.h>         // MFC core and standard components
#include <afxcmn.h>         // MFC support for Windows Common Controls
#include <afxtempl.h>
#include <afxcoll.h>
#include <afxext.h>         // MFC extensions

#endif //_CONSOLE

#define WIN32_LEAN_AND_MEAN   // This trims down the windows libraries.
#define WIN32_EXTRA_LEAN      // Trims even farther.

#include <windows.h>
#include <winsock.h>
#include <wininet.h>
#include <process.h>
#include <commctrl.h>
#include <raserror.h>
#include <mmsystem.h>
#include <direct.h>
#include <io.h>
#include <crtdbg.h>
#include <tchar.h>
#include <crtdbg.h>
#include <delayimp.h>

#include "Stackwalker.h"

#endif //_WIN32

///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
//
// Standard Libraries
//
///////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////


//
// Standard Template libraries
//
#include <cassert>
#include <cerrno>
#include <algorithm>
#include <cctype>
#include <ctime>
#include <cmath>
#include <cstdio>
#include <cstdlib>
#include <cstdarg>
#include <cstring>
#include <string>
#include <iostream>
#include <fstream>
#include <sstream>
#include <vector>


//
// Standard C Runtime libraries
//
#include <sys/stat.h>
#include <sys/types.h>
#include <fcntl.h>


//
// Namespace Modifiers
//
using namespace std;


//
// Unify C Runtime Library across platforms 
//
#ifdef _WIN32

#define vsnprintf               _vsnprintf
#define fdopen                  _fdopen
#define dup                     _dup
#define unlink                  _unlink
#define strdup                  _strdup
#define read                    _read
#define stat                    _stat

#endif

// On the Win32 platform include file and line number information for each
//   memory allocation/deallocation
#if (defined(_WIN32) && !defined(__AFX_H__))

#ifdef _DEBUG

#define   malloc(s)                             _malloc_dbg(s, _NORMAL_BLOCK, __FILE__, __LINE__)
#define   calloc(c, s)                          _calloc_dbg(c, s, _NORMAL_BLOCK, __FILE__, __LINE__)
#define   realloc(p, s)                         _realloc_dbg(p, s, _NORMAL_BLOCK, __FILE__, __LINE__)
#define   _expand(p, s)                         _expand_dbg(p, s, _NORMAL_BLOCK, __FILE__, __LINE__)
#define   free(p)                               _free_dbg(p, _NORMAL_BLOCK)
#define   _msize(p)                             _msize_dbg(p, _NORMAL_BLOCK)
#define   _aligned_malloc(s, a)                 _aligned_malloc_dbg(s, a, __FILE__, __LINE__)
#define   _aligned_realloc(p, s, a)             _aligned_realloc_dbg(p, s, a, __FILE__, __LINE__)
#define   _aligned_offset_malloc(s, a, o)       _aligned_offset_malloc_dbg(s, a, o, __FILE__, __LINE__)
#define   _aligned_offset_realloc(p, s, a, o)   _aligned_offset_realloc_dbg(p, s, a, o, __FILE__, __LINE__)
#define   _aligned_free(p)                      _aligned_free_dbg(p)

#define DEBUG_NEW   new(_NORMAL_BLOCK, __FILE__, __LINE__)

// The following macros set and clear, respectively, given bits 
// of the C runtime library debug flag, as specified by a bitmask. 
#define SET_CRT_DEBUG_FIELD(a)      _CrtSetDbgFlag((a) | _CrtSetDbgFlag(_CRTDBG_REPORT_FLAG)) 
#define CLEAR_CRT_DEBUG_FIELD(a)    _CrtSetDbgFlag(~(a) & _CrtSetDbgFlag(_CRTDBG_REPORT_FLAG)) 

#else

#define DEBUG_NEW   new

#define SET_CRT_DEBUG_FIELD(a) ((void) 0) 
#define CLEAR_CRT_DEBUG_FIELD(a) ((void) 0) 

#endif //_DEBUG

#define new DEBUG_NEW

#endif //_WIN32

#endif //_STDAFX_H_