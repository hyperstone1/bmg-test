<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>


<nav class="navbar left-menu">
	<ul class="navbar__menu">
		<?
		foreach($arResult as $arItem):
			if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
				continue;
		?>
				<li class="navbar__menu-link"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
			

			
		<?endforeach?>
	</ul>
</nav>
	
<?endif?>

