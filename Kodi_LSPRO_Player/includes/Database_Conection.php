<?php

/*
 ┌────────────────────────────────────────────────────────────┐
 |  For More Modules Or Updates Stay Connected to Kodi dot AL |
 └────────────────────────────────────────────────────────────┘
 ┌───────────┬────────────────────────────────────────────────┐
 │ Package   │ Kodi Builder                                   │
 │ Version   │ 2.1                                            │
 │ Support   │ KODI Structure                                 │
 │ Drive     │ SQLI                                           │
 │ PHP Ver   │ 5.X.X - 7.X.X                                  │
 │ Licence   │ MIT                                            │
 │ Author    │ Olsion Bakiaj                                  │
 │ Email     │ TRC4@USA.COM                                   │
 │ Author    │ Endrit Pano                                    │
 │ Email     │ INFO@ALBDROID.AL                               │
 │ Website   │ https://kodi.al                                │
 │ Facebook  │ /albdroid.official/                            │
 │ Github    │ github.com/SxtBox                              │
 │ Created   │ 12/08/2019                                     │
 │ Modified  │ 06/03/2020                                     │
 └────────────────────────────────────────────────────────────┘
 NOTE
 TO USE THIS YOU NEED [live streamspro] KODI PLUGIN
 Addon Host: https://addons.kodi.al/
 DirectLink: https://addons.kodi.al/LiveStreamsPro.zip
*/

define('KODI_TAGS_NO_ACTION', 0);            // MOS E NGACMO [DEF 0]
define('KODI_TAGS_STRIP', 1);               // MOS E NGACMO [DEF 1]
define('KODI_TAGS_SPECIAL_CHARS', 8);      // MOS E NGACMO [DEF 8]
define('KODI_TAGS_VALIDATE', 16);         // MOS E NGACMO [DEF 16]
define('KODI_TAGS_STRIP_AND_NL2BR', 32); // MOS E NGACMO [DEF 32]
define('KODI_SLASHES_AUTO', 0);         // MOS E NGACMO [DEF 0]
define('KODI_SLASHES_ADD', 1);         // MOS E NGACMO [DEF 1]
define('KODI_SLASHES_STRIP', 2);      // MOS E NGACMO [DEF 2]
define('KODI_SLASHES_NO_ACTION', 3); // MOS E NGACMO [DEF 3]

/**
* Database class
*/

class Database_Conection {

    // variables
	var $Database_Host; // PHP7 MYSQLI
    var $Database_User;
    var $Database_Pass;
	var $Database_Name;
    var $con;

    /**
    * constructor
    */
    // DB CONNECTION
    function Database_Conection() {
		$this->Database_Host = 'localhost'; // PHP7 MYSQLI
        $this->Database_User = 'root';
        $this->Database_Pass = 'root';
		$this->Database_Name = 'Kodi_PHP_Structure';
		
		// PHP7 MYSQLI
        $this->con = mysqli_connect($this->Database_Host, $this->Database_User, $this->Database_Pass, $this->Database_Name); 
		
		// PHP5 MYSQL [OLD CONNECTION]
        //$this->con = mysql_connect("localhost", $this->Database_User, $this->Database_Pass);
        //mysql_select_db($this->Database_Name, $this->con);
        //mysql_query("SET names UTF8");
    }

    /**
    * execute sql query and return one value result
    */

    function getOne($query, $index = 0) {
        if (! $query)
            return false;
        $res = mysqli_query($query);
        $RES_ARRAY = array();
        if ($res && mysqli_num_rows($res))
            $RES_ARRAY = mysqli_fetch_array($res);
        if (count($RES_ARRAY))
            return $RES_ARRAY[$index];
        else
            return false;
    }

    /**
    * execute any query 
    */

    function res($query, $error_checking = true) {
        if(!$query)
            return false;
        $res = mysqli_query($this->con, $query);
        if (!$res)
            $this->error('Database Query Error', false, $query);
        return $res;
    }

    /**
    * execute sql query and return table of records as result
    */

    function Get_Query($query, $Field_Key, $Field_Value, $Array_Type = MYSQLI_ASSOC) {
        if (! $query)
            return array();

        $res = $this->res($query);
        $RES_ARRAY = array();
        if ($res) {
            while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            $RES_ARRAY[$row[$Field_Key]] = $row[$Field_Value];
            }
            mysqli_free_result($res);
        }
        return $RES_ARRAY;
    }

    /**
    * execute sql query and return table of records as result
    */

    function getAll($query, $Array_Type = MYSQLI_ASSOC) {
        if (! $query)
            return array();

        if ($Array_Type != MYSQLI_ASSOC && $Array_Type != MYSQLI_NUM && $Array_Type != MYSQLI_BOTH)
            $Array_Type = MYSQLI_ASSOC;

        $res = $this->res($query);
        $RES_ARRAY = array();
        if ($res) {
            while ($row = mysqli_fetch_array($res, $Array_Type))
            $RES_ARRAY[] = $row;
            mysqli_free_result($res);
        }
        return $RES_ARRAY;
    }

    /**
    * execute sql query and return one row result
    */

    function getRow($query, $Array_Type = MYSQLI_ASSOC)
    {
        if(!$query)
        return array();
        if($Array_Type != MYSQLI_ASSOC && $Array_Type != MYSQLI_NUM && $Array_Type != MYSQLI_BOTH)
        $Array_Type = MYSQLI_ASSOC;
        $res = $this->res ($query);
        $RES_ARRAY = array();
        if($res && mysqli_num_rows($res))
        {
        $RES_ARRAY = mysqli_fetch_array($res, $Array_Type);
        mysqli_free_result($res);
        }
        return $RES_ARRAY;
    }

    function escape($s) {
        return mysqli_real_escape_string($s);
    }

    function lastId() {
        return mysqli_insert_id($this->con);
    }

    function process_db_input($text, $strip_tags = 0, $addslashes = 0) {
        if ((get_magic_quotes_gpc() && $addslashes == KODI_SLASHES_AUTO) || $addslashes == KODI_SLASHES_STRIP)
            $text = stripslashes($text);
        elseif ($addslashes == KODI_SLASHES_ADD)
            $text = addslashes($text);

        switch ($strip_tags) {
            case KODI_TAGS_STRIP_AND_NL2BR:
                return mysqli_real_escape_string(nl2br(strip_tags($text)));
            case KODI_TAGS_STRIP:
                return mysqli_real_escape_string(strip_tags($text));    
            case KODI_TAGS_SPECIAL_CHARS:
                return mysqli_real_escape_string(htmlspecialchars($text, ENT_QUOTES, 'UTF-8')); 
            case KODI_TAGS_VALIDATE:
                return mysqli_real_escape_string(clear_xss($text));
            case KODI_TAGS_NO_ACTION:
            default:
                return mysqli_real_escape_string($text);
        }	
    }

    function error($text, $Force_Error_Checking = false, $SQLQUERY = '') {
        //echo $text; exit;
        $this->Generate_MySQL_Errors ($text, $SQLQUERY);
    }

    function Generate_MySQL_Errors($out, $query ='') {
        $Back_Trace = debug_backtrace();
        unset( $Back_Trace[0] );

        if( $query )
        {
            //try help to find error

            $Found_Error = array();

            foreach( $Back_Trace as $Call_Arguments )
            {
                foreach( $Call_Arguments['args'] as $Argument_Number => $Argument_Value )
                {
                    if( is_string($Argument_Value) and strcmp( $Argument_Value, $query ) == 0 )
                    {
                        $Found_Error['file']     = $Call_Arguments['file'];
                        $Found_Error['line']     = $Call_Arguments['line'];
                        $Found_Error['function'] = $Call_Arguments['function'];
                        $Found_Error['arg']      = $Argument_Number;
                    }
                }
            }

if( $Found_Error )
{
$Found_Errors = <<<Found_Errors
<br />
Found error in the file '<b>{$Found_Error['file']}</b>' At Line <b>{$Found_Error['line']}</b>.<br />
Called '<b>{$Found_Error['function']}</b>' Function With Error Argument #<b>{$Found_Error['arg']}</b>.<br /><br />
Found_Errors;
}
}
echo $Found_Errors; exit;
}
}

$GLOBALS['MYSQLI'] = new Database_Conection();
?>