<?php

if(!function_exists('sanitize')) {
	function sanitize($input, $rules = 0) {
		$ret = $input;
		switch (intval($rules)){
		case 1:
			$ret = preg_replace('#[{}\|\\\^<>]#','',$ret);
			break;
		}
		/*if ($rules & RSS_SANITIZER_SIMPLE_SQL) {
			$ret = rss_real_escape_string($ret);
		}
		if ($rules & RSS_SANITIZER_NO_SPACES) {
			$ret = preg_replace('#\s#','',$ret);
			// also strip out SQL comments
		$ret = preg_replace('#/\*.*\*/#','',$ret);
		/*}
		if ($rules & RSS_SANITIZER_NUMERIC) {
			$ret = preg_replace('#[^0-9\.-]#','',$ret);
		}
		if ($rules & RSS_SANITIZER_CHARACTERS) {
			$ret = preg_replace('#[^a-zA-Z]#','',$ret);
		}
		if ($rules & RSS_SANITIZER_CHARACTERS_EXT) {
			$ret = preg_replace('#[^a-zA-Z_]#','',$ret);
		}
		if ($rules & RSS_SANITIZER_WORDS) {
			$ret = preg_replace('#[^a-zA-Z0-9\-\._]#','',$ret);
		}
		if ($rules & RSS_SANITIZER_URL) {
			// filter out "unsafe" characters: {,},|,\,^,<,>
			$ret = preg_replace('#[{}\|\\\^<>]#','',$ret);
		}
		 */
			return $ret;
	}
}






