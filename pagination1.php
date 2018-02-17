<?php
// ini_set('display_errors',1); 
// error_reporting(E_ALL);
// mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

	$conn = mysqli_connect("localhost","root","root","craigslist",3306);
	if (!$conn) 
	{
		
		die("Connection failed: " . mysqli_connect_error());
	}
	
	if(isset($_COOKIE['cityID']))
	{
		$c_id = $_COOKIE['cityID'];
		$query= mysqli_query($conn,"select count(postID) from jobs_gigs, address where sectionID = $section_id AND status='active' AND address.addressID = jobs_gigs.addressID AND address.cityID = $c_id;");
	}
	else
	{
		$query=mysqli_query($conn,"select count(postID) from jobs_gigs where sectionID = $section_id AND status='active';");

	}
	
	$row = mysqli_fetch_row($query);
	
	// error_log("====================",0);
	$rows = $row[0];
	// error_log($rows,0);
	$page_rows = 2;

	$last = ceil($rows/$page_rows);
	// error_log($last,0);
	
	if($last < 1)
	{
		$last = 1;
	}

	$pagenum = 1;

	if(isset($_GET['pn']))
	{
		$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
	}

	if ($pagenum < 1) 
	{ 
		$pagenum = 1; 
	} 
	else if ($pagenum > $last) 
	{ 
		$pagenum = $last; 
	}

	$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
	// error_log($limit,0);
	// error_log($pagenum."--pagenum",0);
	// error_log($page_rows."--pagerows",0);
	// error_log("----------",0);
	// error_log($limit,0);
	// error_log($limit,0);
	
	
	if(isset($_COOKIE['cityID']))
	{
		$c_id = $_COOKIE['cityID'];
		$nquery= mysqli_query($conn,"select postID, title from jobs_gigs, address where sectionID = $section_id AND status='active' AND address.addressID = jobs_gigs.addressID AND address.cityID = $c_id $limit");
	}
	else
	{
		$nquery=mysqli_query($conn,"select postID, title from jobs_gigs where sectionID = $section_id AND status='active' $limit");

	}
	
	$paginationCtrls = '';
	$_SESSION["pagectr"]=$paginationCtrls;
	if($last != 1)
	{		
		if ($pagenum > 1) 
		{
			$previous = $pagenum - 1;
			$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'" class="btn btn-default">Previous</a> &nbsp; &nbsp; ';
			$_SESSION["pagectr"]=$paginationCtrls;
			
			for($i = $pagenum-4; $i < $pagenum; $i++){
				if($i > 0)
				{
					$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn btn-default">'.$i.'</a> &nbsp; ';
					$_SESSION["pagectr"]=$paginationCtrls;
				}
			}
		}
		
		$paginationCtrls .= ''.$pagenum.' &nbsp; ';
		$_SESSION["pagectr"]=$paginationCtrls;

		for($i = $pagenum+1; $i <= $last; $i++)
		{
			$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn btn-default">'.$i.'</a> &nbsp; ';
			$_SESSION["pagectr"]=$paginationCtrls;
			
			if($i >= $pagenum+4)
			{
				break;
			}
		}

		if ($pagenum != $last) 
		{
			$next = $pagenum + 1;
			$paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'" class="btn btn-default">Next</a> ';
			$_SESSION["pagectr"]=$paginationCtrls;
		}
	}	
	
	$_SESSION["pagectr"]=$paginationCtrls;
		
?>