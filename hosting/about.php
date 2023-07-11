<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("BMG");


$arElement = CIBlockElement::GetList(
    Array("SORT" => "ASC"), // Сортировка элементов
    Array( "IBLOCK_ID" => 5),
    false,
    Array ("nTopCount" => 1)
);
while ($ob = $arElement->GetNextElement()) {
$arProperties = $ob->GetProperties();?>

<section class="about">
  <section class="about_aim">
    <div class="about_container">
      <div class="about_aim__complex">
        <div class="about_aim-title"><?=$arProperties['TITLE_NAME']['VALUE'];?></div>
        <div class="about_aim-subtitle">
            <?=$arProperties['TITLE_DESCRIPTION']['VALUE'];?>
        </div>
        <a href="#down1">
        <div class="about_aim__btn">
          <span class="about_aim__btn-text">Оставить заявку</span>
          <button class="btn-about">
            <svg
              width="30"
              height="16"
              viewBox="0 0 30 16"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M1 7C0.447715 7 0 7.44772 0 8C0 8.55228 0.447715 9 1 9V7ZM29.7071 8.70711C30.0976 8.31658 30.0976 7.68342 29.7071 7.29289L23.3431 0.928932C22.9526 0.538408 22.3195 0.538408 21.9289 0.928932C21.5384 1.31946 21.5384 1.95262 21.9289 2.34315L27.5858 8L21.9289 13.6569C21.5384 14.0474 21.5384 14.6805 21.9289 15.0711C22.3195 15.4616 22.9526 15.4616 23.3431 15.0711L29.7071 8.70711ZM1 9L29 9V7L1 7V9Z"
                fill="#D01181"
              />
            </svg>
          </button>
        </div>
        </a>
      </div>
      <div class="about_aim__projects">
        <div class="about_aim__advantage">
          <div class="about_aim__advantage-title"><?=$arProperties['NUMBER_AGE']['VALUE'];?> лет</div>
          <div class="about_aim__advantage-subscription">
              <?=$arProperties['DESCRIPTION_AGE']['VALUE'];?>
          </div>
        </div>
        <div class="about_aim__project">
          <div class="about_aim__project-img">
            <img src="/bitrix/templates/bmg/images/about/about_project_1.webp" alt="" />
          </div>
          <div class="about_aim__project-img">
            <img src="/bitrix/templates/bmg/images/about/about_project_2.webp" alt="" />
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="about_company">
    <div class="container about_company_container">
      <div class="about_company__gradient">
        <img src="/bitrix/templates/bmg/images/about/background.webp" alt="" />
      </div>
      <h2 class="about_company-title">О компании</h2>
      <div class="about_company__content">
        <div class="about_company__content-img">
          <img src="/bitrix/templates/bmg/images/about/about_company_img.webp" alt="" />
        </div>
        <div class="about_company__info">
          <div class="about_company__info_text">
            <h5 class="about_company__info-title"><?=$arProperties['O_COMPANY_BIG']['VALUE'];?></h5>
            <span class="about_company__info-subscription">
              <p>
                  
                 <?php echo $arProperties['O_COMPANY_SMALL']['~VALUE']['TEXT'];?>
              </p>
            </span>
          </div>

          <div class="about_company__footer">
            <div class="about_company__footer-work"> <?=$arProperties['WORK_WITH']['VALUE'];?></div>
            <div class="about_company__footer__img">
              <img src="/bitrix/templates/bmg/images/about/footer_img.webp" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="about_advantages">
    <div class="container about_advantages_container">
      <div class="about_advantages-title">Преимущества</div>
      <div class="about_advantages__list">
          <?php

          foreach ($arProperties['ADVANTAGES']['VALUE'] as $advantage) {
          ?>
        <div class="about_advantages__list-advantage">
          <div class="about_advantages__list-gradient">
            <img
              src="/bitrix/templates/bmg/images/about/gradient_1.webp"
              alt="<?=$advantage;?>"
            />
          </div>
          <div class="about_advantages__list-title"><?=$advantage;?></div>
        </div>
          <?php } ?>
      </div>
    </div>
  </section>
</section>
<?php } ?>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/bmg/сonnection.php");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>


