<?php
	# Enkoder Class
	# Paul Redmond - ported from Hivelogic's Enkoder for Rails
	#
	# Example Usage:
	# $enkoder = new Enkoder();
	# echo $enkoder->enkode_mail('you@yours.com', 'HTML Link Text', 'Optional Title Attribute', 'Optional Subject');
	#
	
	class Enkoder
	{
		function enkode_mail($email, $link_text, $title_text = null, $subject = null)
		{
			$str  = '';
			$str .= '<a href="mailto:' . $email;
			$str .= !empty($subject) ? '?subject='.$subject : null;
			$str .= '" title="';
			$str .= !empty($title_text) ? $title_text : null;
			$str .= '">' . $link_text . '</a>';
			return $this->enkode($str);
		}
		
		function enkode($html, $max_length = 1024)
		{
			$rnd = 10 + (rand() * 90);
			$kodes = array(
				array(
					//'php' => create_function('$kode', 'return strrev($kode);'),
					'php' => create_function('$kode','$kode = str_split($kode); return join("", array_reverse($kode));'),
					'js'  => ";kode=kode.split('').reverse().join('')"
				),
/*
				array(
					'php' => create_function('$kode',
						'$result = "";
						for ( $i = 0; $i < strlen($kode); ++$i ) {
							$b = ord($kode[$i]);
							$b += 3;
							if ($b > 126){$b -= 95;}
							$result .= chr($b);
						}
						return $result;'),
					'js' => (
						";x='';for(i=0;i<kode.length;i++){c=kode.charCodeAt(i)-3;".
						"if(c<32)c+=95;x+=String.fromCharCode(c)}kode=x"
					)
				),
*/
				array(
					'php' => create_function('$kode',
						'$len = strlen($kode) / 2;
						$len -= 1;
						$d = str_split($kode);
						for($i = 0; $i <= $len; $i++) {
							$d[$i*2] ^= $d[$i*2+1] ^= $d[$i*2] ^= $d[$i*2+1];
						}
						$d = join("", $d);
						return $d;'
					),
					'js' => (
						";x='';for(i=0;i<(kode.length-1);i+=2){".
						"x+=kode.charAt(i+1)+kode.charAt(i)}".
						"kode=x+(i<kode.length?kode.charAt(kode.length-1):'');"
					)
				)
			);
			
			$kode = "document.write(". $this->__js_dbl_quote($html) .");";
			if(strlen($kode) > $max_length) {
                $max_length = strlen($kode) + 1;
			}
			//$max_length = $max_length > strlen($kode) ? $max_length : strlen($kode) + 1;
			
			$result = '';
			
			while(strlen($kode) < $max_length)
			{
				$idx = intval(rand(0, count($kodes) - 1));
				$kode = $kodes[$idx]['php']($kode);
				$kode = "kode=" . $this->__js_dbl_quote($kode) . $kodes[$idx]['js'];
				$js = "var kode=\n".$this->__js_wrap_quote($this->__js_dbl_quote($kode), 79);
				$js = $js . "\n;var i,c,x;while(eval(kode));";
				$js = "function wp_enkoder(){".$js."}wp_enkoder();";
				$js = '<script type="text/javascript">'."\n/* <![CDATA[ */\n".$js;
				$js = $js . "\n/* ]]> */\n</script>";
				if (strlen($result) < $max_length)
				{
					$result = $js;
				}
			}
			
			return $result;
			
		} # end enkode method
		
		function __js_dbl_quote($str)
		{
			return '"'.addslashes($str).'"';
		}
		
		function __js_wrap_quote($str, $max_line_length)
		{
			$max_line_length -= 3;
			$inQ = false;
			$esc = 0;
			$lineLen = 0;
			$result = '';
			$chunk = '';
			while(strlen($str) > 0)
			{
				if (preg_match('/^\\\[0-7]{3}/i', $str)) {
					$chunk = substr($str, 0, 3);
					$str = substr_replace($str, '', 0, 3);
				}
				elseif(preg_match('/^\\\./i', $str)) {
					$chunk = substr($str, 0, 2);
					$str = substr_replace($str, '', 0, 2);
				}
				else {
					$chunk = substr($str, 0, 1);
					$str = substr_replace($str, '', 0, 1);
				}
				if ($lineLen + strlen($chunk) >= $max_line_length)
				{
					$result .= '"+'."\n".'"';
					$lineLen = 1;
				}
				$lineLen += strlen($chunk);
				$result .= $chunk;
			}
			return $result;
		} # end __js_wrap_quote method
	
	} # End Enkoder Class
?>