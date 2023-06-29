<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Услуги");


$arElement = CIBlockElement::GetList(
    array("SORT" => "ASC"), // Сортировка элементов
    array("IBLOCK_ID" => 2, "SECTION_ID" => 14),
    false,
    array("nTopCount" => 1)
);
while ($ob = $arElement->GetNextElement()) {
$arFields = $ob->GetFields();
$arProperties = $ob->GetProperties();
?>

<section class="services">
  <div class="services-gradient">
    <img src="/bitrix/templates/bmg/images/services/gradient_services.webp" alt="" />
  </div>
  <section class="services_summary">
    <div class="services_summary__container">
      <div class="services_summary__text">
        <div class="services_summary__text-title">Предоставляемые услуги</div>
        <div class="services_summary__text-description">
          <?php
              echo $arFields['NAME'];
          ?>
            <a href="#down1">
          <div class="services_summary__btn">
            <span class="services_summary__btn-text">Оставить заявку</span>
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
      </div>
      <div class="services_summary__info">
        <div class="swiper-container services_summary__info-slider">
          <div class="swiper-wrapper services_summary__info-wrapper">
              <?php
              $countSlaider = 6;
              $i = 1;
              foreach ($arProperties['IMG_SLAIDER']['VALUE'] as $SlaiderID) {
                  if ($i <= $countSlaider  ) { ?>
                      <div class="swiper-slide services_summary__info-slide">
                          <img src="<?=CFile::GetPath($SlaiderID)?>" alt="" />
                      </div>
                      <?php
                      $i++;
                     } else {
                            break;
                     }
                }
              
             ?>
          </div>
        </div>
        <div class="slider-navigation">
          <div class="slider-prev">
            <div class="arrow_fill-prev">
              <svg
                width="49"
                height="23"
                viewBox="0 0 49 23"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M47 12.748C47.8284 12.748 48.5 12.0765 48.5 11.248C48.5 10.4196 47.8284 9.74805 47 9.74805L47 12.748ZM0.939339 10.1874C0.353554 10.7732 0.353554 11.7229 0.939338 12.3087L10.4853 21.8546C11.0711 22.4404 12.0208 22.4404 12.6066 21.8546C13.1924 21.2689 13.1924 20.3191 12.6066 19.7333L4.12132 11.248L12.6066 2.76276C13.1924 2.17697 13.1924 1.22723 12.6066 0.641439C12.0208 0.0556522 11.0711 0.0556521 10.4853 0.641439L0.939339 10.1874ZM47 9.74805L2 9.74804L2 12.748L47 12.748L47 9.74805Z"
                  fill="#F9FBFE"
                />
              </svg>
            </div>
            <svg
              width="49"
              height="23"
              viewBox="0 0 49 23"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M47 12.748C47.8284 12.748 48.5 12.0765 48.5 11.248C48.5 10.4196 47.8284 9.74805 47 9.74805L47 12.748ZM0.939339 10.1874C0.353554 10.7732 0.353554 11.7229 0.939338 12.3087L10.4853 21.8546C11.0711 22.4404 12.0208 22.4404 12.6066 21.8546C13.1924 21.2689 13.1924 20.3191 12.6066 19.7333L4.12132 11.248L12.6066 2.76276C13.1924 2.17697 13.1924 1.22723 12.6066 0.641439C12.0208 0.0556522 11.0711 0.0556521 10.4853 0.641439L0.939339 10.1874ZM47 9.74805L2 9.74804L2 12.748L47 12.748L47 9.74805Z"
                fill="#F9FBFE"
              />
            </svg>
          </div>
          <div class="slider-next">
            <div class="arrow_fill-next">
              <svg
                width="49"
                height="23"
                viewBox="0 0 49 23"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M2 9.74805C1.17157 9.74805 0.5 10.4196 0.5 11.248C0.5 12.0765 1.17157 12.748 2 12.748L2 9.74805ZM48.0607 12.3087C48.6464 11.7229 48.6464 10.7732 48.0607 10.1874L38.5147 0.641448C37.9289 0.0556615 36.9792 0.0556614 36.3934 0.641448C35.8076 1.22723 35.8076 2.17698 36.3934 2.76277L44.8787 11.2481L36.3934 19.7333C35.8076 20.3191 35.8076 21.2689 36.3934 21.8547C36.9792 22.4404 37.9289 22.4404 38.5147 21.8547L48.0607 12.3087ZM2 12.748L47 12.7481L47 9.74805L2 9.74805L2 12.748Z"
                  fill="#F9FBFE"
                />
              </svg>
            </div>

            <svg
              width="49"
              height="23"
              viewBox="0 0 49 23"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M2 9.74805C1.17157 9.74805 0.5 10.4196 0.5 11.248C0.5 12.0765 1.17157 12.748 2 12.748L2 9.74805ZM48.0607 12.3087C48.6464 11.7229 48.6464 10.7732 48.0607 10.1874L38.5147 0.641448C37.9289 0.0556615 36.9792 0.0556614 36.3934 0.641448C35.8076 1.22723 35.8076 2.17698 36.3934 2.76277L44.8787 11.2481L36.3934 19.7333C35.8076 20.3191 35.8076 21.2689 36.3934 21.8547C36.9792 22.4404 37.9289 22.4404 38.5147 21.8547L48.0607 12.3087ZM2 12.748L47 12.7481L47 9.74805L2 9.74805L2 12.748Z"
                fill="#F9FBFE"
              />
            </svg>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="services_list">
    <div class="services_list_container">
      <div class="services_list__title">
        <div class="services_list__title-title">
            <?php
                echo $arProperties['TITLE_SERVIS']['VALUE'];
                }
            ?>
        </div>
      </div>
        <?$APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "services-page-list-service",
            array(
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "ADD_SECTIONS_CHAIN" => "Y",
                "AJAX_MODE" => "N",
                "AJAX_OPTION_ADDITIONAL" => "",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "Y",
                "CACHE_TIME" => "36000000",
                "CACHE_TYPE" => "A",
                "CHECK_DATES" => "Y",
                "DETAIL_URL" => "",
                "DISPLAY_BOTTOM_PAGER" => "Y",
                "DISPLAY_DATE" => "Y",
                "DISPLAY_NAME" => "Y",
                "DISPLAY_PICTURE" => "Y",
                "DISPLAY_PREVIEW_TEXT" => "Y",
                "DISPLAY_TOP_PAGER" => "N",
                "FIELD_CODE" => array(
                    0 => "",
                    1 => "",
                ),
                "FILTER_NAME" => "",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "IBLOCK_ID" => "2",
                "IBLOCK_TYPE" => "Raznoe",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
                "INCLUDE_SUBSECTIONS" => "Y",
                "MESSAGE_404" => "",
                "NEWS_COUNT" => "6",
                "PAGER_BASE_LINK_ENABLE" => "N",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "N",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_TEMPLATE" => "moreServices",
                "PAGER_TITLE" => "Новости",
                "PARENT_SECTION" => "",
                "PARENT_SECTION_CODE" => "",
                "PREVIEW_TRUNCATE_LEN" => "",
                "PROPERTY_CODE" => array(
                    0 => "",
                    1 => "",
                ),
                "SET_BROWSER_TITLE" => "N",
                "SET_LAST_MODIFIED" => "N",
                "SET_META_DESCRIPTION" => "N",
                "SET_META_KEYWORDS" => "N",
                "SET_STATUS_404" => "N",
                "SET_TITLE" => "N",
                "SHOW_404" => "N",
                "SORT_BY1" => "SORT",
                "SORT_BY2" => "SORT",
                "SORT_ORDER1" => "ASC",
                "SORT_ORDER2" => "ASC",
                "STRICT_SECTION_CHECK" => "N",
                "COMPONENT_TEMPLATE" => "services-page-list-service"
            ),
            false
        );?>
    </div>
  </section>
</section>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/bmg/сonnection.php");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
