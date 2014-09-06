
<div class="hero-unit span10">			
	<h2 class="span10"><?=$resume["Resume"]["first_name"]." ".$resume["Resume"]["last_name"]; ?></h2>
	<table class="span4">
		<tr><td>电子邮件：</td><td><?=$resume["Resume"]["email"]; ?></td></tr>
		<tr><td>目标职位：</td><td><?= $resume["Resume"]["objective"];?></td></tr>
	</table>
	<div class="clear"></div>
	<h4 class="span4">个人简介：</h4>
	<p class="span10"><?=$resume["Resume"]["description"]; ?></p>
</div>			
<?php if(!empty($edus)):?>
<div class="hero-unit span10">
	<h3 class="span10">教育经历：</h3>
	<?php foreach ($edus as $t):?>
	<div class="item">
		<table class="span10">
			<tr>
				<td class="span2"><?=$t["Education"]["degree"]; ?></td>
				<td class="span2"><?=$t["Education"]["school"]; ?></td>
				<td class="span4"><?=$t["Education"]["in_date"]."——".$t["Education"]["out_date"]; ?></td>
			</tr>
		</table>
		<div class="clear"></div>
		<h4 class="span4">补充说明：</h4>
		<p class="span10"><?=$t["Education"]["description"]; ?></p>
	</div>
	<?php endforeach; ?>							
</div>
<?php endif;?>
<?php if(!empty($exps)):?>
<div class="hero-unit span10">
	<h3 class="span10">职场经历：</h3>
	<?php foreach ($exps as $t):?>
	<div class="item">
		<table class="span10">
			<tr>
				<td class="span2"><?=$t["Experience"]["title"]; ?></td>
				<td class="span2"><?=$t["Experience"]["company"]; ?></td>
				<td class="span4"><?=$t["Experience"]["in_date"]."——".$t["Experience"]["out_date"];?></td>
			</tr>
		</table>
		<div class="clear"></div>
		<h4 class="span4">补充说明：</h4>
		<p class="span10"><?=$t["Experience"]["description"]; ?></p>					
	</div>
	<?php endforeach;?>		
</div>
<?php endif; ?>
<?php if(!empty($sks)):?>
<div class="hero-unit span10">
	<h3 class="span10">掌握技能：</h3>
	<?php foreach ($sks as $t):?>
	<div class="item">
		<table class="span5">
			<tr>
				<td class="span2"><?=$t["Skill"]["skillname"]; ?></td>
				<td class="span2"><?=$t["Skill"]["level"]; ?></td>
			</tr>
		</table>
		<div class="clear"></div>		
	</div>
	<?php endforeach; ?>						
</div>
<?php endif; ?>
<?php if(!empty($bks)):?>
<div class="hero-unit span10">
	<h3 class="span10">出版书籍：</h3>
	<div class="item">
	<?php foreach ($bks as $t):?>	
		<table class="span8">
			<tr>
				<td class="span4"><?=$t["Book"]["bookname"]; ?></td>
				<td class="span2"><?=$t["Book"]["pubdate"]; ?></td>
			</tr>
		</table>
		<div class="clear"></div>
		<h4 class="span4">补充说明：</h4>
		<p class="span10"><?=$t["Book"]["description"]; ?></p>	
	</div>		
	<?php endforeach; ?>		
</div>
<?php endif; ?>