<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");


$arElementProject = CIBlockElement::GetList(
 Array("SORT" => "ASC"), // Сортировка элементов
 Array( "IBLOCK_ID" => 3, "ID" => $_GET['ID']),
 false,
 Array("nTopCount" => 1),
);
while ($obProjects = $arElementProject->GetNextElement()) {
 $arFieldsProjects = $obProjects->GetFields();
 $arPropertiesProjects = $obProjects->GetProperties();

 $APPLICATION->SetTitle($arFieldsProjects['NAME']);

 $arElementServicesChoose = CIBlockElement::GetList(
  Array("SORT" => "ASC"), // Сортировка элементов
  Array( "IBLOCK_ID" => 7),
  false,
  Array ("nTopCount" => 1)
);
while ($obMainChoose = $arElementServicesChoose->GetNextElement()) {
  $arPropertiesChoose = $obMainChoose->GetProperties();

?>
<section class="project_details">
  <div class="project_details_container">
    <div class="project_details__info">
      <div class="project_details__info-subtitle">Подробнее о проекте</div>
      <div class="project_details__info-title"><?= $arFieldsProjects['NAME'];?></div>
      <div class="project_details__info_container swiper-container">
        <div class="proejct_details__info_wrapper swiper-wrapper">
        <?php foreach ($arPropertiesProjects['IMG_PROJECT_SLAIDER']['VALUE'] as $projectsID) { ?>
          <div class="project_details__info-img swiper-slide">
            <img src="<?=CFile::GetPath($projectsID)?>" alt="" />
          </div>
         <?php } ?>
        </div>
        <div class="project_details__info_container-navigation">
          <div class="project_details__info_container-prev swiper-button-prev">
            <div class="back">
              <svg
                width="49"
                height="24"
                viewBox="0 0 49 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M47 13.5C47.8284 13.5 48.5 12.8284 48.5 12C48.5 11.1716 47.8284 10.5 47 10.5L47 13.5ZM0.939339 10.9393C0.353554 11.5251 0.353554 12.4749 0.939338 13.0607L10.4853 22.6066C11.0711 23.1924 12.0208 23.1924 12.6066 22.6066C13.1924 22.0208 13.1924 21.0711 12.6066 20.4853L4.12132 12L12.6066 3.51471C13.1924 2.92893 13.1924 1.97918 12.6066 1.39339C12.0208 0.807605 11.0711 0.807605 10.4853 1.39339L0.939339 10.9393ZM47 10.5L2 10.5L2 13.5L47 13.5L47 10.5Z"
                  fill="#F9FBFE"
                />
              </svg>
            </div>
          </div>
          <div class="project_details__info_container-next swiper-button-next">
            <div class="next">
              <svg
                width="49"
                height="24"
                viewBox="0 0 49 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M2 10.5C1.17157 10.5 0.5 11.1716 0.5 12C0.5 12.8284 1.17157 13.5 2 13.5L2 10.5ZM48.0607 13.0607C48.6464 12.4749 48.6464 11.5251 48.0607 10.9393L38.5147 1.3934C37.9289 0.807615 36.9792 0.807615 36.3934 1.3934C35.8076 1.97919 35.8076 2.92894 36.3934 3.51472L44.8787 12L36.3934 20.4853C35.8076 21.0711 35.8076 22.0208 36.3934 22.6066C36.9792 23.1924 37.9289 23.1924 38.5147 22.6066L48.0607 13.0607ZM2 13.5L47 13.5L47 10.5L2 10.5L2 13.5Z"
                  fill="#F9FBFE"
                />
              </svg>
            </div>
          </div>
        </div>
      </div>
      

      <div class="project_details__info-chapter">
        <?php
              $res = CIBlockSection::GetByID($arFieldsProjects['IBLOCK_SECTION_ID']);
              if($ar_res = $res->GetNext())
                  echo $ar_res['NAME'];
              ?>
      </div>
      <div class="project_details__info-text">
        <p>
          <?= $arFieldsProjects['PREVIEW_TEXT']; ?>
        </p>
      </div>
    </div>
    <div class="project_details__other_project">
      <div class="project_details__other_project-list">
          <?php
        
           foreach ($arPropertiesChoose['PROJECT_RECLAMA']['VALUE'] as $projectsID) { 
            $resChooseProject = CIBlockElement::GetList(
              Array("SORT" => "ASC"),
              Array("IBLOCK_ID" => 3, "ID" => $projectsID),
              false,
              Array("nTopCount" => 1),
              Array("DETAIL_PAGE_URL", "IBLOCK_SECTION_ID", "NAME", "PROPERTY_SMALL_TEXT_CARD")
          );
            while($ar_resChooseProject = $resChooseProject->GetNext()) { ?>
                <a href="<?=$ar_resChooseProject['DETAIL_PAGE_URL']?>" class="project_details__other_project-item">
                  <div class="project_details__other_project-chapter">
                  
                      <?php
                      $resSection = CIBlockSection::GetByID($ar_resChooseProject['IBLOCK_SECTION_ID']);
                      if($ar_resSection = $resSection->GetNext())
                          echo $ar_resSection['NAME'];
                      ?>
                      
                  </div>
                  <div class="project_details__other_project-title"><?=$ar_resChooseProject['NAME'];?></div>
                  <div class="project_details__other_project-text">
                  <?=$ar_resChooseProject['PROPERTY_SMALL_TEXT_CARD_VALUE']['TEXT'];?>
                  </div>
                </a>
            <?php } } 
          ?>
       
          <?php } ?>
      </div>
    </div>
  </div>
</section>
<?php } ?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
