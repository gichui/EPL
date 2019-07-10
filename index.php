<?php include_once"database.php" ?>
<?php
$query="SELECT * FROM epl_teams ";
$teams=mysqli_query($con,$query) 
?>
<?php
$query0="SELECT * FROM away_teams ";
$team1=mysqli_query($con,$query0) 
?>
<?php
$query1="SELECT * FROM away_odd ";
$awayodd=mysqli_query($con,$query1) 
?>
<?php
$query2="SELECT * FROM home_odd ";
$homeodd=mysqli_query($con,$query2) 
?>
<!DOCTYPE html>
<html>
<head>
	<title>football satatisics</title>
	<link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body >
	<form action="index.php" method="POST">
	
		<table class="head" Border = "5" CellPadding = "10" CellSpacing = "20" align="center" Bgcolor = "pink"style="width:50%" >

			<caption><marquee width="50%" scrollamount=10 direction="left" behavior="scroll"><h1>EPL VIRTUAL LEGUE***** win big with us</h1></marquee></caption>
			<div class="head">
			<th>
				home team
			</th>
			<th>
				away team
			</th>
			<th>
				home odds
			</th>
			<th>
				away odd
			</th>
			<tr>
			</div>
				<td>
					
					<SELECT  name="home_team">
						
						<?php while ($row=mysqli_fetch_assoc($teams)) : ?>
						
						

							
						

						<OPTION class="home" value=<?php echo $row['HOME']; ?>>
							<?php echo $row['HOME']; ?>

							
						
						

							

							
					<?php endwhile; ?>	
					</SELECT>
					

							
						

						
				</td>
				<td>
				 	<SELECT name="away_team">
						
						<?php while ($row=mysqli_fetch_assoc($team1)) : ?>
						
						

							
						

						<OPTION value=<?php echo $row['AWAY']; ?>>
							<?php echo $row['AWAY']; ?>

							
						
						

							

							
					<?php endwhile; ?>	
					</SELECT>
				</td>
				<td>
				 	<SELECT name="HODD">
						
						<?php while ($row=mysqli_fetch_assoc($homeodd)) : ?>
						
						

							
						

						<OPTION value=<?php echo $row['H_ODD']; ?>>
							<?php echo $row['H_ODD']; ?>

							
						
						

							

							
					<?php endwhile; ?>	
					</SELECT>
				</td>
				<td>
				 	<SELECT name="AODD">
						
						<?php while ($row=mysqli_fetch_assoc($awayodd)) : ?>
						
						

							
						

						<OPTION value=<?php echo $row['A_ODD']; ?>>
							<?php echo $row['A_ODD']; ?>

							
						
						

							

							
					<?php endwhile; ?>	
					</SELECT>
				</td>


			</tr>
			<tr>
				<td align="center">
					<input type="submit" name="submit">
				</td>
			</tr>
			
		</table>
	
		
	</form>
	

	<?php

	if (isset($_POST['home_team']) && isset($_POST['away_team'])) 
		{
		$home=$_POST['home_team'];
		$away=$_POST['away_team'];
		$home_odd=$_POST['HODD'];
		$away_odd=$_POST['AODD'];
		
		echo"<hr>"."HEAD TO HEAD MARTCH"."<hr>";
		echo "<table Border = 1 CellPadding = bordercolor=red CellSpacing = 1 align=left Bgcolor = cyan style=width:100%>";
				echo "<CAPTION>";
					echo "<marquee width=50% scrollamount=10 direction=right behavior=slide>";
					echo "<h1>head to head</h1>";
					echo "</marquee>";
				echo "</CAPTION>";
				
			
				echo "<th width=10%>";
					echo "home team";
				echo "</th>";
				echo "<th width=10%>";
					echo "away team";
				echo "</th>";
				echo "<th width=5%>";
					echo "home average goal";
				echo "</th>";
				echo "<th width=5%>";
					echo "away average goal";
				echo "</th>";
				echo "<th width=5%>";
					echo "home odds";
				echo "</th>";
				echo "<th width=5%>";
					echo "draw odds";
				echo "</th>";
				echo "<th width=5%>";
					echo "away odds";

				echo "</th>";
				echo "<th width=5%>";
					echo "result";
				echo "</th>";
				echo "<th width=5%>";
					echo "HOME %";
				echo "</th>";
				echo "<th width=5%>";
					echo "draw %";
				echo "</th>";
				echo "<th width=5%>";
					echo "away %";
				echo "</th>";


		echo "</table>";
		$COMB="SELECT * FROM analysis WHERE (HOME='$home' AND AWAY='$away') ";
		$query1=mysqli_query($con,$COMB);
		$count=0;
		$hgoal=0;
		$agoal=0;
		$hav=0;
		$ave=0;
		$hw=0;
		$aw=0;
		$dd=0;
		$count1=0;

		while ($row=mysqli_fetch_assoc($query1)) {
			if ($count1>19) 
			{
				$count1=0;
				$hgoal=0;
				$agoal=0;
				$hav=0;
				$ave=0;
				$hw=0;
				$aw=0;
				$dd=0;



				# code...
			}
			
		


			
			if ($count1==0 ) {
				
					$HOME_AV=$hgoal;
					$away_AV=$agoal;
				echo "<table Border = 1 CellPadding = bordercolor=red CellSpacing = 1 align=left Bgcolor = red style=width:100%>";
				
				echo "<tr>";
					echo "<td width=10% VALIGN=top>";
						echo $row['HOME'];
					echo "</td>";
					echo "<td width=10%  VALIGN=top>";
						echo $row['AWAY'];
					echo "</td>";
					echo "<td width=5%>";
						echo $HOME_AV;
					echo "</td>";
					echo "<td width=5%>";
						echo $away_AV;
					echo "</td>";
					echo "<td width=5%>";
						echo $row['H_ODD'];
					echo "</td>";
					echo "<td width=5%>";
						echo $row['D_ODD'];
					echo "</td>";
					echo "<td width=5%>";
						echo $row['A_ODD'];
					echo "</td>";
					echo "<td width=5%>";
						echo $row['HG'].":".$row['AG'];
					echo "</td>";
					echo "<td width=5%>";
						echo $hw;
					echo "</td>";
					echo "<td width=5%>";
						echo $dd;
					echo "</td>";
					echo "<td width=5%>";
						echo $aw;
					echo "</td>";
					
				echo "</tr>";
			echo "</table>";
					# code...
				
				# code...
			}else{
				$hw1=round(($hw)/($count1)*100,1);
				$aw1=round(($aw)/($count1)*100,1);
				$dd1=round(($dd)/($count1)*100,1);

				$HOME_AV=round($hgoal/$count1,1);
				$away_AV=round($agoal/$count1,2);
				echo "<table Border = 1 CellPadding = bordercolor=red CellSpacing = 1 align=left Bgcolor = green style=width:100%>";
				
				echo "<tr>";
					echo "<td width=10% VALIGN=top>";
						echo $row['HOME'];
					echo "</td>";
					echo "<td width=10%  VALIGN=top>";
						echo $row['AWAY'];
					echo "</td>";
					echo "<td width=5%>";
						echo $HOME_AV;
					echo "</td>";
					echo "<td width=5%>";
						echo $away_AV;
					echo "</td>";
					echo "<td width=5%>";
						echo $row['H_ODD'];
					echo "</td>";
					echo "<td width=5%>";
						echo $row['D_ODD'];
					echo "</td>";
					echo "<td width=5%>";
						echo $row['A_ODD'];
					echo "</td>";
					echo "<td width=5%>";
						echo $row['HG'].":".$row['AG'];
					echo "</td>";
					echo "<td width=5%>";
						echo $hw1."%";
					echo "</td>";
					echo "<td width=5%>";
						echo $dd1."%";
					echo "</td>";
					echo "<td width=5%>";
						echo $aw1."%";
					echo "</td >";
					
				echo "</tr>";
			echo "</table>";
			
			}
			if($row['HG']>$row['AG'])
				{
					$hw=$hw+1;
				}
			else if($row['HG']<$row['AG'])
				{
					$aw=$aw+1;
				}

			else if($row['HG']==$row['AG'])
				{
					$dd=$dd+1;
				}

			
			$hgoal=$hgoal+$row['HG'];
			$agoal=$agoal+$row['AG'];
			$count++;
			$count1++;

			
		}
		echo"<hr>"."HISTORY FOR HOME SCORE AND CONSEDS"."<hr>";
		echo "<table Border = 1 CellPadding = bordercolor=red CellSpacing = 1 align=left Bgcolor = cyan style=width:100%>";
				echo "<CAPTION>";
					echo "<marquee width=50% scrollamount=10direction=left>";
					echo "<h1>HISTORY FOR HOME SCORE AND CONSEDS</h1>";
					echo "</marquee>";
				echo "</CAPTION>";
				echo "<th width=10%>";
					echo "home team";
				echo "</th>";
				echo "<th width=10%>";
					echo "away team";
				echo "</th>";
				echo "<th width=5%>";
					echo "home average goal";
				echo "</th>";
				echo "<th width=5%>";
					echo "away average goal";
				echo "</th>";
				echo "<th width=5%>";
					echo "home odds";
				echo "</th>";
				echo "<th width=5%>";
					echo "draw odds";
				echo "</th>";
				echo "<th width=5%>";
					echo "away odds";

				echo "</th>";
				echo "<th width=5%>";
					echo "result";
				echo "</th>";
				echo "<th width=5%>";
					echo "HOME %";
				echo "</th>";
				echo "<th width=5%>";
					echo "draw %";
				echo "</th>";
				echo "<th width=5%>";
					echo "away %";
				echo "</th>";


		echo "</table>";

		$COMB="SELECT * FROM analysis WHERE HOME='$home'  ";
		$query1=mysqli_query($con,$COMB);
		$count=0;
		$hgoal=0;
		$agoal=0;
		$hav=0;
		$ave=0;
		$hw=0;
		$aw=0;
		$dd=0;
		$count1=0;

		while ($row=mysqli_fetch_assoc($query1)) {
			if ($count1>19) 
			{
				$count1=0;
				$hgoal=0;
				$agoal=0;
				$hav=0;
				$ave=0;
				$hw=0;
				$aw=0;
				$dd=0;



				# code...
			}
			
		


			
			if ($count1==0 ) {
				
					$HOME_AV=$hgoal;
					$away_AV=$agoal;
				echo "<table Border = 1 CellPadding = bordercolor=red CellSpacing = 1 align=left Bgcolor = red style=width:100%>";
				
				echo "<tr>";
					echo "<td width=10% VALIGN=top>";
						echo $row['HOME'];
					echo "</td>";
					echo "<td width=10%  VALIGN=top>";
						echo $row['AWAY'];
					echo "</td>";
					echo "<td width=5%>";
						echo $HOME_AV;
					echo "</td>";
					echo "<td width=5%>";
						echo $away_AV;
					echo "</td>";
					echo "<td width=5%>";
						echo $row['H_ODD'];
					echo "</td>";
					echo "<td width=5%>";
						echo $row['D_ODD'];
					echo "</td>";
					echo "<td width=5%>";
						echo $row['A_ODD'];
					echo "</td>";
					echo "<td width=5%>";
						echo $row['HG'].":".$row['AG'];
					echo "</td>";
					echo "<td width=5%>";
						echo $hw;
					echo "</td>";
					echo "<td width=5%>";
						echo $dd;
					echo "</td>";
					echo "<td width=5%>";
						echo $aw;
					echo "</td>";
					
				echo "</tr>";
			echo "</table>";
					# code...
				
				# code...
			}else{
				$hw1=round(($hw)/($count1)*100,1);
				$aw1=round(($aw)/($count1)*100,1);
				$dd1=round(($dd)/($count1)*100,1);

				$HOME_AV=round($hgoal/$count1,1);
				$away_AV=round($agoal/$count1,2);
				echo "<table Border = 1 CellPadding = bordercolor=red CellSpacing = 1 align=left Bgcolor = green style=width:100%>";
				
				echo "<tr>";
					echo "<td width=10% VALIGN=top>";
						echo $row['HOME'];
					echo "</td>";
					echo "<td width=10%  VALIGN=top>";
						echo $row['AWAY'];
					echo "</td>";
					echo "<td width=5%>";
						echo $HOME_AV;
					echo "</td>";
					echo "<td width=5%>";
						echo $away_AV;
					echo "</td>";
					echo "<td width=5%>";
						echo $row['H_ODD'];
					echo "</td>";
					echo "<td width=5%>";
						echo $row['D_ODD'];
					echo "</td>";
					echo "<td width=5%>";
						echo $row['A_ODD'];
					echo "</td>";
					echo "<td width=5%>";
						echo $row['HG'].":".$row['AG'];
					echo "</td>";
					echo "<td width=5%>";
						echo $hw1."%";
					echo "</td>";
					echo "<td width=5%>";
						echo $dd1."%";
					echo "</td>";
					echo "<td width=5%>";
						echo $aw1."%";
					echo "</td >";
					
				echo "</tr>";
			echo "</table>";
			
			}
			if($row['HG']>$row['AG'])
				{
					$hw=$hw+1;
				}
			else if($row['HG']<$row['AG'])
				{
					$aw=$aw+1;
				}

			else if($row['HG']==$row['AG'])
				{
					$dd=$dd+1;
				}

			
			$hgoal=$hgoal+$row['HG'];
			$agoal=$agoal+$row['AG'];
			$count++;
			$count1++;

			
		}
		echo"<hr>"."HISTORY FOR AWAY SCORE AND CONSEDS"."<hr>";
		echo "<table Border = 1 CellPadding = bordercolor=red CellSpacing = 1 align=left Bgcolor = cyan style=width:100%>";
				echo "<CAPTION>";
					echo "<marquee width=50% scrollamount=10 direction=right>";
					echo "<h1>HISTORY FOR AWAY SCORE AND CONSEDS</h1>";
					echo "</marquee>";
				echo "</CAPTION>";
				echo "<th width=10%>";
					echo "home team";
				echo "</th>";
				echo "<th width=10%>";
					echo "away team";
				echo "</th>";
				echo "<th width=5%>";
					echo "home average goal";
				echo "</th>";
				echo "<th width=5%>";
					echo "away average goal";
				echo "</th>";
				echo "<th width=5%>";
					echo "home odds";
				echo "</th>";
				echo "<th width=5%>";
					echo "draw odds";
				echo "</th>";
				echo "<th width=5%>";
					echo "away odds";

				echo "</th>";
				echo "<th width=5%>";
					echo "result";
				echo "</th>";
				echo "<th width=5%>";
					echo "HOME %";
				echo "</th>";
				echo "<th width=5%>";
					echo "draw %";
				echo "</th>";
				echo "<th width=5%>";
					echo "away %";
				echo "</th>";


		echo "</table>";

		$COMB="SELECT * FROM analysis WHERE AWAY='$away' ";
		$query1=mysqli_query($con,$COMB);
		$count=0;
		$hgoal=0;
		$agoal=0;
		$hav=0;
		$ave=0;
		$hw=0;
		$aw=0;
		$dd=0;
		$count1=0;

		while ($row=mysqli_fetch_assoc($query1)) {
			if ($count1>19) 
			{
				$count1=0;
				$hgoal=0;
				$agoal=0;
				$hav=0;
				$ave=0;
				$hw=0;
				$aw=0;
				$dd=0;



				# code...
			}
			
		


			
			if ($count1==0 ) {
				
					$HOME_AV=$hgoal;
					$away_AV=$agoal;
				echo "<table Border = 1 CellPadding = bordercolor=red CellSpacing = 1 align=left Bgcolor = red style=width:100%>";
				
				echo "<tr>";
					echo "<td width=10% VALIGN=top>";
						echo $row['HOME'];
					echo "</td>";
					echo "<td width=10%  VALIGN=top>";
						echo $row['AWAY'];
					echo "</td>";
					echo "<td width=5%>";
						echo $HOME_AV;
					echo "</td>";
					echo "<td width=5%>";
						echo $away_AV;
					echo "</td>";
					echo "<td width=5%>";
						echo $row['H_ODD'];
					echo "</td>";
					echo "<td width=5%>";
						echo $row['D_ODD'];
					echo "</td>";
					echo "<td width=5%>";
						echo $row['A_ODD'];
					echo "</td>";
					echo "<td width=5%>";
						echo $row['HG'].":".$row['AG'];
					echo "</td>";
					echo "<td width=5%>";
						echo $hw;
					echo "</td>";
					echo "<td width=5%>";
						echo $dd;
					echo "</td>";
					echo "<td width=5%>";
						echo $aw;
					echo "</td>";
					
				echo "</tr>";
			echo "</table>";
					# code...
				
				# code...
			}else{
				$hw1=round(($hw)/($count1)*100,1);
				$aw1=round(($aw)/($count1)*100,1);
				$dd1=round(($dd)/($count1)*100,1);

				$HOME_AV=round($hgoal/$count1,1);
				$away_AV=round($agoal/$count1,2);
				echo "<table Border = 1 CellPadding = bordercolor=red CellSpacing = 1 align=left Bgcolor = green style=width:100%>";
				
				echo "<tr>";
					echo "<td width=10% VALIGN=top>";
						echo $row['HOME'];
					echo "</td>";
					echo "<td width=10%  VALIGN=top>";
						echo $row['AWAY'];
					echo "</td>";
					echo "<td width=5%>";
						echo $HOME_AV;
					echo "</td>";
					echo "<td width=5%>";
						echo $away_AV;
					echo "</td>";
					echo "<td width=5%>";
						echo $row['H_ODD'];
					echo "</td>";
					echo "<td width=5%>";
						echo $row['D_ODD'];
					echo "</td>";
					echo "<td width=5%>";
						echo $row['A_ODD'];
					echo "</td>";
					echo "<td width=5%>";
						echo $row['HG'].":".$row['AG'];
					echo "</td>";
					echo "<td width=5%>";
						echo $hw1."%";
					echo "</td>";
					echo "<td width=5%>";
						echo $dd1."%";
					echo "</td>";
					echo "<td width=5%>";
						echo $aw1."%";
					echo "</td >";
					
				echo "</tr>";
			echo "</table>";
			
			}
			if($row['HG']>$row['AG'])
				{
					$hw=$hw+1;
				}
			else if($row['HG']<$row['AG'])
				{
					$aw=$aw+1;
				}

			else if($row['HG']==$row['AG'])
				{
					$dd=$dd+1;
				}

			
			$hgoal=$hgoal+$row['HG'];
			$agoal=$agoal+$row['AG'];
			$count++;
			$count1++;

			
		}
		echo "<table Border = 1 CellPadding = bordercolor=red CellSpacing = 1 align=left Bgcolor = cyan style=width:100%>";
				echo "<CAPTION>";
					echo "<marquee width=50% scrollamount=10direction=left>";
					echo "<h1>table based on  AWAY odds</h1>";
					echo "</marquee>";
				echo "<th width=10%>";
					echo "home team";
				echo "</th>";
				echo "<th width=10%>";
					echo "away team";
				echo "</th>";
				echo "<th width=5%>";
					echo "home average goal";
				echo "</th>";
				echo "<th width=5%>";
					echo "away average goal";
				echo "</th>";
				echo "<th width=5%>";
					echo "home odds";
				echo "</th>";
				echo "<th width=5%>";
					echo "draw odds";
				echo "</th>";
				echo "<th width=5%>";
					echo "away odds";

				echo "</th>";
				echo "<th width=5%>";
					echo "result";
				echo "</th>";
				echo "<th width=5%>";
					echo "HOME %";
				echo "</th>";
				echo "<th width=5%>";
					echo "draw %";
				echo "</th>";
				echo "<th width=5%>";
					echo "away %";
				echo "</th>";


		echo "</table>";
		$l1=$home_odd+0.05;
		$l2=$home_odd-0.05;
		$l3=$away_odd+0.05;
		$l4=$away_odd-0.05;

		$COMB1="SELECT * FROM analysis WHERE (AWAY='$away' and A_ODD<'$l3' and A_ODD>'$l4')  ";
		$query1=mysqli_query($con,$COMB1);
		$count=0;
		$hgoal=0;
		$agoal=0;
		$hav=0;
		$ave=0;
		while ($row=mysqli_fetch_assoc($query1)) 
		{	
			if($count<19)
					{


							if ($count==0) 
							{
								$HOME_AV=$hgoal;
								$away_AV=$agoal;
								echo "<table Border = 1 CellPadding = bordercolor=red CellSpacing = 1 align=left Bgcolor = red style=width:100%>";
						
								echo "<tr>";
									echo "<td width=20% VALIGN=top>";
										echo $row['HOME'];
									echo "</td>";
									echo "<td width=20%  VALIGN=top>";
										echo $row['AWAY'];
									echo "</td>";
									echo "<td width=10%>";
										echo $HOME_AV;
									echo "</td>";
									echo "<td width=10%>";
										echo $away_AV;
									echo "</td>";
									echo "<td width=5%>";
										echo $row['H_ODD'];
									echo "</td>";
									echo "<td width=5%>";
										echo $row['D_ODD'];
									echo "</td>";
									echo "<td width=5%>";
										echo $row['A_ODD'];
									echo "</td>";
									echo "<td width=5%>";
										echo $row['HG'].":".$row['AG'];
									echo "</td>";
							
										echo "</tr>";
								echo "</table>";
						# code...
							}
							else
							{

								$HOME_AV=round($hgoal/$count ,2);
								$away_AV=round($agoal/$count,2);
								echo "<table Border = 1 CellPadding = bordercolor=red CellSpacing = 1 align=left Bgcolor = green style=width:100%>";
						
								echo "<tr>";
									echo "<td width=20% VALIGN=top>";
										echo $row['HOME'];
									echo "</td>";
									echo "<td width=20%  VALIGN=top>";
										echo $row['AWAY'];
									echo "</td>";
									echo "<td width=10%>";
										echo $HOME_AV;
									echo "</td>";
									echo "<td width=10%>";
										echo $away_AV;
									echo "</td>";
									echo "<td width=5%>";
										echo $row['H_ODD'];
									echo "</td>";
									echo "<td width=5%>";
										echo $row['D_ODD'];
									echo "</td>";
									echo "<td width=5%>";
										echo $row['A_ODD'];
									echo "</td>";
									echo "<td width=5%>";
										echo $row['HG'].":".$row['AG'];
									echo "</td>";
							
								echo "</tr>";
							echo "</table>";
							}

			
							$hgoal=$hgoal+$row['HG'];
							$agoal=$agoal+$row['AG'];
					$count++;

			








				}


		}

			
			

			
		echo "<table Border = 1 CellPadding = bordercolor=red CellSpacing = 1 align=left Bgcolor = cyan style=width:100%>";
				echo "<CAPTION>";
					echo "<marquee width=70% scrollamount=10 direction=right>";
					echo "<h1>table based on HOME  odds</h1>";
					echo "</marquee>";
				echo "</CAPTION>";
				echo "<th width=20%>";
					echo "home team";
				echo "</th>";
				echo "<th width=20%>";
					echo "away team";
				echo "</th>";
				echo "<th width=10%>";
					echo "home average goal";
				echo "</th>";
				echo "<th width=10%>";
					echo "away average goal";
				echo "</th>";
				echo "<th width=5%>";
					echo "home odds";
				echo "</th>";
				echo "<th width=5%>";
					echo "draw odds";
				echo "</th>";
				echo "<th width=5%>";
					echo "away odds";

				echo "</th>";
				echo "<th width=5%>";
					echo "result";
				echo "</th>";


		echo "</table>";
		$l1=$_POST['HODD']+0.05;
		$l2=$_POST['HODD']-0.05;

		$COMB="SELECT * FROM analysis WHERE (HOME='$home' and H_ODD<'$l1' and H_ODD>'$l2')  ";
		$query1=mysqli_query($con,$COMB);
		$count=0;
		$hgoal=0;
		$agoal=0;
		$hav=0;
		$ave=0;
		while ($row=mysqli_fetch_assoc($query1)) 
		{

			
			if ($count==0) {
				$HOME_AV=$hgoal;
				$away_AV=$agoal;
				echo "<table Border = 1 CellPadding = bordercolor=red CellSpacing = 1 align=left Bgcolor = red style=width:100%>";
				
				echo "<tr>";
					echo "<td width=20% VALIGN=top>";
						echo $row['HOME'];
					echo "</td>";
					echo "<td width=20%  VALIGN=top>";
						echo $row['AWAY'];
					echo "</td>";
					echo "<td width=10%>";
						echo $HOME_AV;
					echo "</td>";
					echo "<td width=10%>";
						echo $away_AV;
					echo "</td>";
					echo "<td width=5%>";
						echo $row['H_ODD'];
					echo "</td>";
					echo "<td width=5%>";
						echo $row['D_ODD'];
					echo "</td>";
					echo "<td width=5%>";
						echo $row['A_ODD'];
					echo "</td>";
					echo "<td width=5%>";
						echo $row['HG'].":".$row['AG'];
					echo "</td>";
					
				echo "</tr>";
			echo "</table>";
				# code...
			}else{

				$HOME_AV=round($hgoal/$count ,2);
				$away_AV=round($agoal/$count,2);
				echo "<table Border = 1 CellPadding = bordercolor=red CellSpacing = 1 align=left Bgcolor = green style=width:100%>";
				
				echo "<tr>";
					echo "<td width=20% VALIGN=top>";
						echo $row['HOME'];
					echo "</td>";
					echo "<td width=20%  VALIGN=top>";
						echo $row['AWAY'];
					echo "</td>";
					echo "<td width=10%>";
						echo $HOME_AV;
					echo "</td>";
					echo "<td width=10%>";
						echo $away_AV;
					echo "</td>";
					echo "<td width=5%>";
						echo $row['H_ODD'];
					echo "</td>";
					echo "<td width=5%>";
						echo $row['D_ODD'];
					echo "</td>";
					echo "<td width=5%>";
						echo $row['A_ODD'];
					echo "</td>";
					echo "<td width=5%>";
						echo $row['HG'].":".$row['AG'];
					echo "</td>";
					
				echo "</tr>";
			echo "</table>";
			}

			
			$hgoal=$hgoal+$row['HG'];
			$agoal=$agoal+$row['AG'];
			$count++;

			
		}

		
		}
	?>

		

</body>
</html>