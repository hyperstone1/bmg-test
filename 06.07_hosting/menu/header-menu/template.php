<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>

<div class="menu-column left-menu">
	<div class="container_menu">
            <nav class="mobile-nav">

				<?
				foreach($arResult as $arItem):
					if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
						continue;
				?>
						<li class="navbar__menu-link"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
					

					
				<?endforeach?>
		</nav>
        <div class="contacts_form__info_description">
            <div class="contacts_form__info-info">
                Напишите нам на почту, чтобы узнать интересующую вас информацию
            </div>
            <div class="contacts_form__info__email">
                <svg
                        width="43"
                        height="43"
                        viewBox="0 0 43 43"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M21.5 43C33.3741 43 43 33.3741 43 21.5C43 9.62588 33.3741 0 21.5 0C9.62588 0 0 9.62588 0 21.5C0 33.3741 9.62588 43 21.5 43ZM12.5858 14.5858C12.9609 14.2107 13.4696 14 14 14H30C30.5304 14 31.0391 14.2107 31.4142 14.5858C31.7893 14.9609 32 15.4696 32 16V18L22 22L12 18V16C12 15.4696 12.2107 14.9609 12.5858 14.5858ZM12.5858 29.4142C12.2107 29.0391 12 28.5304 12 28V20L22 24L32 20V28C32 28.5304 31.7893 29.0391 31.4142 29.4142C31.0391 29.7893 30.5304 30 30 30H14C13.4696 30 12.9609 29.7893 12.5858 29.4142Z"
                            fill="#D01181"
                    />
                </svg>

                <a class="email-contacts_form" href="mailto:info@bmg.am">info@bmg.am</a>
            </div>
        </div>
	</div>
</div>
<div class="mobile-nav-gradient">
    <img src="<?= SITE_TEMPLATE_PATH ?>/images/navbar_gradient.webp" alt="" />
</div>
<div class="header__menu left-menu">
		<nav class="navbar">
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
</div>

<?endif?>

