<?php

	if ( !class_exists('DemoThemeMethods') ) {
		class DemoThemeMethods {			
			public function navigation($items_array, $class) {
				$nav = '<ul class="' . $class . '">';
				
				foreach ( $items_array as $item ) {
					$nav .= '<li><a href="'. $item['url'] . '">' . $item['text'] . '</a></li>';
				}
				
				$nav .= '</ul>';
				
				return $nav;
			}
			
			
			public function query($sql) {
				
				global $dbm;
				
				$content = '<ul class="' . $class . '">';
				$content .= $dbm->query_db($sql);
				$content .= '</ul>';
				
				return $content;
			}
		}
	}
	
	$dtm = new DemoThemeMethods;
	
	if ( !class_exists('DBMethods') ) {
		class DBMethods {
			public function query_db($sql) {
				$mysqli = new mysqli("localhost", "my_db", "password", "my_db");
				if ($mysqli->connect_errno) {
					echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
				}
				
				$result = mysqli_query($mysqli,$sql);
				$html = '';
				while($row = mysqli_fetch_array($result))
				  {
				 	$html .= "<li>".$row['FirstName'] . " " . $row['LastName']."</li>";
				  
				  }
				
				mysqli_close($mysqli);
				return $html;
			}
		}
	}
	
	$dbm = new DBMethods;
	
	
?>