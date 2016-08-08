<?php






if ( ! function_exists('pre'))
{
	function pre($var)
	{
		echo "<pre>";
		print_r($var);
		echo "</pre>";
	}	
}


if ( ! function_exists('esc')) //alias: mysqli_real_escape_string()
{
	function esc($string)
	{
		$CI =& get_instance();
		$CI->load->database();
		$con=mysqli_connect($CI->db->hostname,$CI->db->username,$CI->db->password,$CI->db->database);
		$result=mysqli_real_escape_string($con, trim($string));
		return $result;
	}	
}

if ( ! function_exists('start_precedence'))
{
	function start_precedence($table,$coloum, $id)
	{
		$CI =& get_instance();
		$CI->load->database();
		$con=mysqli_connect($CI->db->hostname,$CI->db->username,$CI->db->password,$CI->db->database);
		$result=mysqli_fetch_assoc(mysqli_query($con, 'select precedence from '.$table.' where '.$coloum.' = '.$id.'  order by precedence asc'));
		return $result['precedence'];
	}	
}

if ( ! function_exists('end_precedence'))
{
	function end_precedence($table, $coloum, $id)
	{
		$CI =& get_instance();
		$CI->load->database();
		$con=mysqli_connect($CI->db->hostname,$CI->db->username,$CI->db->password,$CI->db->database);
		$result=mysqli_fetch_assoc(mysqli_query($con, 'select precedence from '.$table.' where '.$coloum.' = '.$id.' order by precedence desc'));
		return $result['precedence'];
	}	
}

if ( ! function_exists('first_precedence'))
{
	function first_precedence($table)
	{
		$CI =& get_instance();
		$CI->load->database();
		$con=mysqli_connect($CI->db->hostname,$CI->db->username,$CI->db->password,$CI->db->database);
		$sql = 'select precedence from '.$table.' order by precedence asc';
		
		$result = mysqli_fetch_assoc(mysqli_query($con, $sql));
		return $result['precedence'];
	}	
}



if ( ! function_exists('last_precedence'))
{
	function last_precedence($table)
	{
		$CI =& get_instance();
		$CI->load->database();
		$con=mysqli_connect($CI->db->hostname,$CI->db->username,$CI->db->password,$CI->db->database);
		$result=mysqli_fetch_assoc(mysqli_query($con, 'select precedence from '.$table.' order by precedence desc'));
		return $result['precedence'];
	}	
}

if ( ! function_exists('precedence_by'))
{
	function precedence_by($table, $coloum, $id)
	{
		$result=mysqli_fetch_assoc(mysqli_query('select precedence from '.$table.' where '.$coloum.' = '.$id.'  order by precedence desc'));
		return $result['precedence'];
	}	
}

if ( ! function_exists('cat_precedence'))
{
    function cat_precedence($table, $cat)
    {
        $result=mysqli_fetch_assoc(mysqli_query('select precedence from '.$table.' where category_id = '.$cat.' order by precedence desc'));
        return $result['precedence'];
    }   
}

if ( ! function_exists('cat_nilai'))
{
    function cat_nilai($id)
    {
        $result=mysqli_fetch_assoc(mysqli_query('select category_id from homebanner_tb where id = '.$id));
        return $result['category_id'];
    }   
}

if ( ! function_exists('prec_nilai'))
{
    function prec_nilai($id)
    {
        $result=mysqli_fetch_assoc(mysqli_query('select precedence from homebanner_tb where id = '.$id));
        return $result['precedence'];
    }   
}

if ( ! function_exists('findImg'))
{
	function findImg($coloumn,$id,$table)
	{
	//	echo "select `".$coloumn."` from `".$table."` where id='".$id."'";
		$q="select `".$coloumn."` from `".$table."` where image='".$id."'";
		$result=mysqli_fetch_assoc(mysqli_query($q));
		return $result[$coloumn];
	}	
}


if ( ! function_exists('find'))
{
	function find($coloumn,$id,$table)
	{
		$CI =& get_instance();
		$CI->load->database();
		$con=mysqli_connect($CI->db->hostname,$CI->db->username,$CI->db->password,$CI->db->database);
	//	echo "select `".$coloumn."` from `".$table."` where id='".$id."'";
		$q="select `".$coloumn."` from `".$table."` where id='".$id."'";
		$result=mysqli_fetch_assoc(mysqli_query($con, $q));
		return $result[$coloumn];
	}	
}

if ( ! function_exists('first_precedence_2'))
{
	function first_precedence_2($table,$data_1,$data_2)
	{
		$result=mysqli_fetch_assoc(mysqli_query('select precedence from '.$table.' where '.$data_1.' = '.$data_2.' order by precedence asc'));
		return $result['precedence'];
	}	
}

if ( ! function_exists('last_precedence_2'))
{
	function last_precedence_2($table,$data_1,$data_2)
	{
		$result=mysqli_fetch_assoc(mysqli_query('select precedence from '.$table.' where '.$data_1.' = '.$data_2.' order by precedence desc'));
		return $result['precedence'];
	}	
}

if ( ! function_exists('make_alias'))
{
	function make_alias($string)
	{
		$string=strtolower($string);
		
		$string=str_replace('&','n',$string);
		
		$string=preg_replace('/[^a-z0-9]/', "-", $string);
		
		$string=ltrim(rtrim($string,'-'),'-');
		
		return $string;
	}	
}

if ( ! function_exists('first_precedence_2'))
{
	function counter($table,$coloum)
	{
		$result=mysqli_fetch_assoc(mysqli_query('select '.$coloum.' from user_contribution where '.$data_1.' = '.$data_2.' order by precedence asc'));
		return $result['precedence'];
	}	
}

if ( ! function_exists('baseCat'))
{
	function baseCat($cat)
	{
		$query = "SELECT * FROM what_near_item_tb where category_what_near_id = '".esc($cat)."'";
		$item = mysqli_query($query);
		while ($list = mysqli_fetch_assoc($item)) {
			echo '<li><a href="#">'.$list['name'].'</a></li>';
		}
	}	
}

if ( ! function_exists('baseQuestion'))
{
	function baseQuestion($question)
	{
		$query = "SELECT * FROM answer_tb where question_id = '".esc($question)."'";
		$item = mysqli_query($query);
		$yes = "puzzle-yes";
		$no = "puzzle-no";
		while ($list = mysqli_fetch_assoc($item)) {
			if($list['correct']==1){ 
				echo '<li><a href="javascript:void(0);" class="'.$yes.'">'.$list['answer'].'</a></li>';
			} else {
				echo '<li><a href="javascript:void(0);" class="'.$no.'">'.$list['answer'].'</a></li>';
			}
		}
	}	
}


if ( ! function_exists('get_categorydownline_product2'))
{
    function get_categorydownline_product2($parent)
    {
		$q="select * from `category_tb` where `parent_id`='".esc($parent)."'";
        $category=mysqli_query($q);
        if($category){
			//echo "<ul>";
			$counter=1;
        	while ($list = mysqli_fetch_assoc($category)) {
				if($counter==1){
					echo "<ul>";
				}
		        /*echo '<li><a href="javaScript:void(0)" data-name="'.$list['name'].'" data-category="'.$list['id'].'" class="category_item">'.$list['name'].'</a>';*/
				echo '<li><label><input type="checkbox" name="category[]" value="'.$list['id'].'" data-name="'.$list['name'].'" data-category="'.$list['id'].'" class="category_item"> '.$list['name'].'</label>';
				get_categorydownline_product2($list['id']);	
				echo "</li>";
				
				$counter++;
			}
			echo "</ul>";
			if($counter>1){
				echo "</ul>";
			}
		}
    }   
}

if ( ! function_exists('counts'))
{
	function counts($coloumn)
	{
		//echo "SELECT COUNT(".$coloumn.") FROM question_tb where ".$coloumn." = 1";
		$q="SELECT COUNT(".$coloumn.") as counter FROM image_category_tb a join image_item_tb b where a.id = b.image_category_id && a.name = 'photos' && b.active = 1";
		$result=mysqli_fetch_assoc(mysqli_query($q));
		return $result['counter'];
	}
}

if ( ! function_exists('coloum_counter'))
{
	function coloum_counter($table, $coloumn, $where)
	{
		//echo "SELECT COUNT(".$coloumn.") FROM question_tb where ".$coloumn." = 1";
		$q="SELECT COUNT(".$coloumn.") as counter FROM ".$table." where ".$coloumn." = ".$where;
		$result=mysqli_fetch_assoc(mysqli_query($q));
		return $result['counter'];
	}
}

if ( ! function_exists('coun'))
{
	function coun($coloumn)
	{
		//echo "SELECT COUNT(".$coloumn.") FROM question_tb where ".$coloumn." = 1";
		$q="SELECT COUNT(".$coloumn.") as counter FROM update_tb where active=1 AND featured=0";
		$result=mysqli_fetch_assoc(mysqli_query($q));
		return $result['counter'];
	}
}

if ( ! function_exists('count_by_flag'))
{
	function count_by_flag($coloumn,$flag)
	{
		//echo "SELECT COUNT(".$coloumn.") FROM question_tb where ".$coloumn." = 1";
		$q="SELECT COUNT(".$coloumn.") as counter FROM update_tb where active=1 AND featured=0 AND flag=".$flag;
		$result=mysqli_fetch_assoc(mysqli_query($q));
		return $result['counter'];
	}
}

/*if ( ! function_exists('count_by_search'))
{
	function count_by_search($coloumn,$flag)
	{
		//echo "SELECT COUNT(".$coloumn.") FROM question_tb where ".$coloumn." = 1";
		$q="SELECT COUNT(".$coloumn.") as counter FROM update_tb where active=1 AND title=".$flag;
		$result=mysqli_fetch_assoc(mysqli_query($q));
		return $result['counter'];
	}
}*/

if ( ! function_exists('featured_img'))
{
	function featured_img($table, $coloumn, $sub_cat)
	{
		$q="SELECT ".$coloumn." FROM ".$table." where active=1 AND featured=1 AND sub_category_id = ".$sub_cat;
		$result=mysqli_fetch_assoc(mysqli_query($q));
		return $result['thumb'];
	}
}

if ( ! function_exists('featured_vid'))
{
	function featured_vid($table, $coloumn, $sub_cat)
	{
		$q="SELECT ".$coloumn." FROM ".$table." where active=1 AND featured=1 AND sub_category_id = ".$sub_cat;
		$result=mysqli_fetch_assoc(mysqli_query($q));
		return $result['data'];
	}
}
   
?>