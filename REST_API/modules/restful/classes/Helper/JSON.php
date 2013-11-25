<?php defined('SYSPATH') or die('No direct script access.');
/**
 * The Helper_JSON class
 *
 * @package		RESTful
 * @category	Helpers
 * @author		Michał Musiał
 * @copyright	(c) 2013 Michał Musiał
 */
class Helper_JSON {

    /**
     * @param   string  $json
     * @author  umbrae@gmail.com
     * @link    http://www.php.net/manual/en/function.json-encode.php#80339
     */
    static public function format($json)
    {
        $tab = "\t";
        $new_json = "";
        $indent_level = 0;
        $in_string = FALSE;
        $len = strlen($json);

        for ($c = 0; $c < $len; $c++)
        {
            $char = $json[$c];
            switch ($char)
            {
                case '{':
                case '[':
                    if ( ! $in_string)
                    {
                        $new_json .= $char . "\n" . str_repeat($tab, $indent_level + 1);
                        $indent_level++;
                    }
                    else
                    {
                        $new_json .= $char;
                    }
                    break;
                case '}':
                case ']':
                    if ( ! $in_string)
                    {
                        $indent_level--;
                        $new_json .= "\n" . str_repeat($tab, $indent_level) . $char;
                    }
                    else
                    {
                        $new_json .= $char;
                    }
                    break;
                case ',':
                    if ( ! $in_string)
                    {
                        $new_json .= ",\n" . str_repeat($tab, $indent_level);
                    }
                    else
                    {
                        $new_json .= $char;
                    }
                    break;
                case ':':
                    if ( ! $in_string)
                    {
                        $new_json .= ": ";
                    }
                    else
                    {
                        $new_json .= $char;
                    }
                    break;
                case '"':
                    if ($c > 0 && $json[$c-1] != '\\')
                    {
                        $in_string = !$in_string;
                    }
                default:
                    $new_json .= $char;
                    break;
            }
        }

        return $new_json;
    }
}
