<script language="javascript">
function checkup()
{
	if(window.confirm("确定要修改吗？"))
	{
		return true;
	}else
	{
		return false;
	}
}
</script>
<?php
    $db = mysql_connect("localhost", "root");
    mysql_select_db("test_db", $db);
 	$id = 0;
	if (isset($_GET['id'])) $id = $_GET['id'];
	if (isset($_GET['pattern'])) $pattern = $_GET['pattern'];
	if (isset($_GET['delete'])) $delete = $_GET['delete'];
	if (!isset($_GET['pattern']))
	{
?>
		<bgsound src = "hello.wav" loop = 10>
		<frameset cols = "50%, *">
			<frameset rows = "200, *">
				<frame name = "frame1" src = "main.php?pattern=1">
				<frame name = "frame2" src = "main.php?pattern=2">
			</frameset>
			<frame name = "frame3" src = "main.php?pattern=3">
		</frameset>
<?php
	}elseif($pattern==1)//展示所有数据
	{
		$result = mysql_query("SELECT * FROM employees", $db);
		while ($myrow = mysql_fetch_array($result)) {
			printf("<a href=\"%s?pattern=6&id=%s\" target=\"frame2\" >%s %s</a> ", $_SERVER['SCRIPT_NAME'] , $myrow["id"], $myrow["First"], $myrow["Last"]);
			printf("<a href=\"%s?id=%s&delete=yes&pattern=2\" target=\"frame2\">(DELETE)</a><br>\n", $_SERVER['SCRIPT_NAME'] , $myrow["id"]);
		}
?>
		<a href = "main.php?pattern=1"> 更新 </a>
<?php
	}elseif($pattern==2)//展示详细资料，或者判断是否请求删除
	{
		if($id)
		{
			$sql = "SELECT * FROM employees WHERE id=$id";
			$result = mysql_query($sql);
			$myrow = mysql_fetch_array($result);
			echo "First Name: " . $myrow["First"] . "<br>\n";
			echo "Last Name: " . $myrow["Last"] . "<br>\n";
			echo "Address: " . $myrow["address"] . "<br>\n";
			echo "Position: " . $myrow["position"] . "<br>\n";
			echo "gender: " . $myrow["gender"] . "<br>\n";
			if(isset($_GET['delete']))
			{
				printf("您确定要删除？");
?>
				<a href = "main.php?pattern=5<?php echo '&id=' . $id ?>"> confirm </a> 
				<a href = "main.php?pattern=2"> cancel </a> 
<?php
			}
		}else
		{
			printf("欢迎光临");
?>
			<img src = "hello.png" />
<?php
		}
	}elseif($pattern==3)     //插入一组数据
	{
?>
		<br> Insert a new record: <br>
		<form method="post" action="<?php echo $_SERVER['SCRIPT_NAME'] . "?pattern=4" ?>">
		First Name: <input type="Text" name="First"><br>
		Last Name: <input type="Text" name="Last"><br>
		Address: <input type="Text" name="address"><br>
		Position: <input type="Text" name="position"><br>
		gender: <input type="Text" name="gender"><br>
		<input type="Submit" name="submit" value="submit">
		</form>
		<a href = "main.php?pattern=3"> RESET </a> 
<?php
	}elseif($pattern==4)                  //添加落实到数据库
	{
		$int_id=1;
		$result = mysql_query("SELECT * FROM employees", $db);
		while ($myrow = mysql_fetch_array($result)) {
			$int_id=$myrow["id"]+1;
		}
		printf("jinrule");
		$sql = "INSERT INTO employees (First, Last, address, position, gender, id) VALUES ('$_POST[First]', '$_POST[Last]', '$_POST[address]', '$_POST[position]', '$_POST[gender]', $int_id)";
		$result = mysql_query($sql);
		if($result=="ture")
		{
			printf("<br> successfully insert <br>");
		}else
		{
			printf("failed");
		}
?>	
	<a href = "main.php?pattern=3"> 返回 </a> 
<?php
	}elseif($pattern==5)                //删除落实到数据库
	{
		{
			$sql = "DELETE FROM employees WHERE id = $id"; 
            $result = mysql_query($sql);
			if($result=="ture")
			{
				printf("删除成功");
			}else
			{
				printf("failed");
			}
?>
			<a href = "main.php?pattern=2"> 返回 </a> 
<?php
		}
	}elseif($pattern==6)               //展示详细数据
	{
		$sql = "SELECT * FROM employees WHERE id=$id";
		$result = mysql_query($sql);
		$myrow = mysql_fetch_array($result);
		echo "First Name: " . $myrow["First"] . "<br>\n";
		echo "Last Name: " . $myrow["Last"] . "<br>\n";
		echo "Address: " . $myrow["address"] . "<br>\n";
		echo "Position: " . $myrow["position"] . "<br>\n";
		echo "gender: " . $myrow["gender"] . "<br>\n";
		echo "<a href=\"main.php?pattern=7&id=" . $id . "\" target=\"frame3\" > change " . $myrow["First"] . $myrow["Last"] . " </a>";
		//printf("<a href = "main.php?pattern=7&id=%s" target=\"frame3\",$id> 更改 </a> ");
		//echo "<a href=\"main.php?pattern=7&id=" . $id . " target=\"frame3\" > 更改" . $myrow["First"] . $myrow["Last"] . " </a>";
	}elseif($pattern==7)            //更新一组记录
	{
?>
		<br> Update this record: <br>
		<form method="post" action="<?php echo $_SERVER['SCRIPT_NAME'] . "?pattern=8&id=". "$id" ?>">
		First Name: <input type="Text" name="First"><br>
		Last Name: <input type="Text" name="Last"><br>
		Address: <input type="Text" name="address"><br>
		Position: <input type="Text" name="position"><br>
		gender: <input type="Text" name="gender"><br>
		<input type="Submit" name="submit" value="submit" onclick="return checkup()">
		</form>
		<a href = "main.php?pattern=3"> 返回 </a> 
<?php
	}else                        //更新落实到数据库
	{
		$sql = "UPDATE employees SET First = '$_POST[First]', Last = '$_POST[Last]', address = '$_POST[address]', position = '$_POST[position]', gender = '$_POST[gender]' WHERE id = $id";
		$result = mysql_query($sql);
		if($result=="ture")
		{
			printf("更新成功");
		}else
		{
			printf("更新失败");
		}
?>
		<a href = "main.php?pattern=3"> 返回 </a> 
<?php
	}
	mysql_close($db);
?>
