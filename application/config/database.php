<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['dsn']      The full DSN string describe a connection to the database.
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database driver. e.g.: mysqli.
|			Currently supported:
|				 cubrid, ibase, mssql, mysql, mysqli, oci8,
|				 odbc, pdo, postgre, sqlite, sqlite3, sqlsrv
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Query Builder class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|				 NOTE: For MySQL and MySQLi databases, this setting is only used
| 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
|				 (and in table creation queries made with DB Forge).
| 				 There is an incompatibility in PHP with mysql_real_escape_string() which
| 				 can make your site vulnerable to SQL injection if you are using a
| 				 multi-byte character set and are running versions lower than these.
| 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['encrypt']  Whether or not to use an encrypted connection.
|
|			'mysql' (deprecated), 'sqlsrv' and 'pdo/sqlsrv' drivers accept TRUE/FALSE
|			'mysqli' and 'pdo/mysql' drivers accept an array with the following options:
|
|				'ssl_key'    - Path to the private key file
|				'ssl_cert'   - Path to the public key certificate file
|				'ssl_ca'     - Path to the certificate authority file
|				'ssl_capath' - Path to a directory containing trusted CA certificats in PEM format
|				'ssl_cipher' - List of *allowed* ciphers to be used for the encryption, separated by colons (':')
|				'ssl_verify' - TRUE/FALSE; Whether verify the server certificate or not ('mysqli' only)
|
|	['compress'] Whether or not to use client compression (MySQL only)
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|	['ssl_options']	Used to set various SSL options that can be used when making SSL connections.
|	['failover'] array - A array with 0 or more data for connections if the main should fail.
|	['save_queries'] TRUE/FALSE - Whether to "save" all executed queries.
| 				NOTE: Disabling this will also effectively disable both
| 				$this->db->last_query() and profiling of DB queries.
| 				When you run a query, with this setting set to TRUE (default),
| 				CodeIgniter will store the SQL statement for debugging purposes.
| 				However, this may cause high memory usage, especially if you run
| 				a lot of SQL queries ... disable this to avoid that problem.
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $query_builder variables lets you determine whether or not to load
| the query builder class.
*/
$active_group = 'default';
$query_builder = TRUE;
$active_group = 'default';
$active_record = TRUE;

$db['default']['hostname'] ='
(DESCRIPTION=
    (ADDRESS=
      (PROTOCOL=TCP)
      (HOST=10.60.180.14)
      (PORT=1521)
    )
    (CONNECT_DATA=
      (SERVER=dedicated)
      (SERVICE_NAME=tibssub)
    )
  )';

$db['default']['username'] = 'camweb';
$db['default']['password'] = 'camweb';
$db['default']['database'] = 'orcl';
$db['default']['dbdriver'] = 'oci8';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = FALSE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;


/*-----------------------------------------------*/
/*  Optimal Connection
/*
/*-----------------------------------------------*/

$db['optimal']['hostname'] ='
(DESCRIPTION=
(ADDRESS=
(PROTOCOL=TCP)
(HOST=10.62.185.22)
(PORT=1521)
)
(CONNECT_DATA=
(SERVER=dedicated)
(SID=TIBSDEV)
)
)';

$db['optimal']['username'] = 'optimal';
$db['optimal']['password'] = 'telkom135';
$db['optimal']['database'] = 'global_dev';
$db['optimal']['dbdriver'] = 'oci8';
$db['optimal']['dbprefix'] = '';
$db['optimal']['pconnect'] = FALSE;
$db['optimal']['db_debug'] = TRUE;
$db['optimal']['cache_on'] = FALSE;
$db['optimal']['cachedir'] = '';
$db['optimal']['char_set'] = 'utf8';
$db['optimal']['dbcollat'] = 'utf8_general_ci';
$db['optimal']['swap_pre'] = '';
$db['optimal']['autoinit'] = TRUE;
$db['optimal']['stricton'] = FALSE;


/*-----------------------------------------------*/
/*  CCPBB Connection
/*
/*-----------------------------------------------*/

$db['ccpbb']['hostname'] ='
(DESCRIPTION =
    (ADDRESS_LIST =
      (ADDRESS =
        (PROTOCOL = TCP)
        (HOST = 10.60.185.108)
        (PORT = 1521)
      )
    )
    (CONNECT_DATA =
      (SID = TIBSNP)
    )
  )';

$db['ccpbb']['username'] = 'ccpbb';
$db['ccpbb']['password'] = 'telkom_2013';
$db['ccpbb']['database'] = 'tibs_nonpots';
$db['ccpbb']['dbdriver'] = 'oci8';
$db['ccpbb']['dbprefix'] = '';
$db['ccpbb']['pconnect'] = FALSE;
$db['ccpbb']['db_debug'] = TRUE;
$db['ccpbb']['cache_on'] = FALSE;
$db['ccpbb']['cachedir'] = '';
$db['ccpbb']['char_set'] = 'utf8';
$db['ccpbb']['dbcollat'] = 'utf8_general_ci';
$db['ccpbb']['swap_pre'] = '';
$db['ccpbb']['autoinit'] = TRUE;
$db['ccpbb']['stricton'] = FALSE;


/*-----------------------------------------------*/
/*  SIN_CORE Connection
/*
/*-----------------------------------------------*/

$db['corecrm']['hostname'] ='
(DESCRIPTION=
    (ADDRESS=
      (PROTOCOL=TCP)
      (HOST=10.62.185.22)
      (PORT=1521)
    )
    (CONNECT_DATA=
      (SERVER=dedicated)
      (SERVICE_NAME=tibsdev)
    )
  )';

$db['corecrm']['username'] = 'sin_core';
$db['corecrm']['password'] = 'telkom';
$db['corecrm']['database'] = 'global_dev';
$db['corecrm']['dbdriver'] = 'oci8';
$db['corecrm']['dbprefix'] = '';
$db['corecrm']['pconnect'] = FALSE;
$db['corecrm']['db_debug'] = TRUE;
$db['corecrm']['cache_on'] = FALSE;
$db['corecrm']['cachedir'] = '';
$db['corecrm']['char_set'] = 'utf8';
$db['corecrm']['dbcollat'] = 'utf8_general_ci';
$db['corecrm']['swap_pre'] = '';
$db['corecrm']['autoinit'] = TRUE;
$db['corecrm']['stricton'] = FALSE;

/*-----------------------------------------------*/
/*  TOSDB Connection
/*
/*-----------------------------------------------*/

$db['tosdb']['hostname'] ='
(DESCRIPTION=
    (ADDRESS=
      (PROTOCOL=TCP)
      (HOST=10.62.160.135)
      (PORT=1521)
    )
    (CONNECT_DATA=
      (SID=tibsdev)
    )
)';

$db['tosdb']['username'] = 'tosdb';
$db['tosdb']['password'] = 'tosdb';
$db['tosdb']['database'] = '';
$db['tosdb']['dbdriver'] = 'oci8';
$db['tosdb']['dbprefix'] = '';
$db['tosdb']['pconnect'] = FALSE;
$db['tosdb']['db_debug'] = TRUE;
$db['tosdb']['cache_on'] = FALSE;
$db['tosdb']['cachedir'] = '';
$db['tosdb']['char_set'] = 'utf8';
$db['tosdb']['dbcollat'] = 'utf8_general_ci';
$db['tosdb']['swap_pre'] = '';
$db['tosdb']['autoinit'] = TRUE;
$db['tosdb']['stricton'] = FALSE;


/*-----------------------------------------------*/
/*  TOSDB Connection
/*
/*-----------------------------------------------*/

$db['geneva']['hostname'] ='
(DESCRIPTION =
  (ADDRESS =
    (PROTOCOL = TCP)
    (HOST = 10.62.160.135)
    (PORT = 1521)
  )
  (CONNECT_DATA =
    (SERVER = dedicated)
    (SERVICE_NAME = tibsdev)
  )
)';

$db['geneva']['username'] = 'geneva_custom_npots';
$db['geneva']['password'] = 'geneva_custom_npots';
$db['geneva']['database'] = 'tibs_dev';
$db['geneva']['dbdriver'] = 'oci8';
$db['geneva']['dbprefix'] = '';
$db['geneva']['pconnect'] = FALSE;
$db['geneva']['db_debug'] = TRUE;
$db['geneva']['cache_on'] = FALSE;
$db['geneva']['cachedir'] = '';
$db['geneva']['char_set'] = 'utf8';
$db['geneva']['dbcollat'] = 'utf8_general_ci';
$db['geneva']['swap_pre'] = '';
$db['geneva']['autoinit'] = TRUE;
$db['geneva']['stricton'] = FALSE;


/*-----------------------------------------------*/
/*  tosdb Prod Connection
/*
/*-----------------------------------------------*/

$db['tosdb_prod']['hostname'] ='
(DESCRIPTION =
    (ADDRESS_LIST =
      (ADDRESS =
        (PROTOCOL = TCP)
        (HOST = 10.60.185.108)
        (PORT = 1521)
      )
    )
    (CONNECT_DATA =
      (SID = TIBSNP)
    )
  )';

$db['tosdb_prod']['username'] = 'tosdb';
$db['tosdb_prod']['password'] = 'tosdb';
$db['tosdb_prod']['database'] = 'tibs_nonpots';
$db['tosdb_prod']['dbdriver'] = 'oci8';
$db['tosdb_prod']['dbprefix'] = '';
$db['tosdb_prod']['pconnect'] = FALSE;
$db['tosdb_prod']['db_debug'] = TRUE;
$db['tosdb_prod']['cache_on'] = FALSE;
$db['tosdb_prod']['cachedir'] = '';
$db['tosdb_prod']['char_set'] = 'utf8';
$db['tosdb_prod']['dbcollat'] = 'utf8_general_ci';
$db['tosdb_prod']['swap_pre'] = '';
$db['tosdb_prod']['autoinit'] = TRUE;
$db['tosdb_prod']['stricton'] = FALSE;

/*-----------------------------------------------*/
/*  Operasi Connection
/*
/*-----------------------------------------------*/

$db['operasi']['hostname'] ='
(DESCRIPTION =
    (ADDRESS_LIST =
      (ADDRESS =
        (PROTOCOL = TCP)
        (HOST = 10.60.185.108)
        (PORT = 1521)
      )
    )
    (CONNECT_DATA =
      (SID = TIBSNP)
    )
  )';

$db['operasi']['username'] = 'operasi';
$db['operasi']['password'] = 'fbcc_201607';
$db['operasi']['database'] = 'tibs_nonpots';
$db['operasi']['dbdriver'] = 'oci8';
$db['operasi']['dbprefix'] = '';
$db['operasi']['pconnect'] = FALSE;
$db['operasi']['db_debug'] = TRUE;
$db['operasi']['cache_on'] = FALSE;
$db['operasi']['cachedir'] = '';
$db['operasi']['char_set'] = 'utf8';
$db['operasi']['dbcollat'] = 'utf8_general_ci';
$db['operasi']['swap_pre'] = '';
$db['operasi']['autoinit'] = TRUE;
$db['operasi']['stricton'] = FALSE;