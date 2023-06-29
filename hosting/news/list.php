<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новости");
?>
<?php
$arElement = CIBlockElement::GetList(
    Array("SORT" => "ASC"),
    Array("IBLOCK_ID" => 4, "SECTION_ID" =>15),
    false
);
while ($ob = $arElement->GetNextElement()) {
$arProperties = $ob->GetProperties();
?>
<section class="news">
  <div class="news-gradient">
    <img src="/bitrix/templates/bmg/images/news/news_gradient.webp" alt="" />
  </div>
  <section class="news_summary">
    <div class="news_summary__container">
      <div class="news_summary__text">
        <div class="news_summary__text-comment">Будь в курсе</div>
            <div class="news_summary__text-title">
                <?=$arProperties['TITLE_NAME']['VALUE'];?></div>
        <div class="news_summary__text-description">
            <?=$arProperties['TITLE_DESCRIPTION']['VALUE'];?>
        </div>
      </div>
      <div class="news_summary__info">
          <div class="news_summary__info-img">
              <img src="/bitrix/templates/bmg/images/news/news_summary_img.webp" alt="" />
          </div>
          <div class="news_summary__info_last_news">
              <h4 class="news_summary__info_last_news-title">Последние новости</h4>
                  <?php
                  $arElementLastNews = CIBlockElement::GetList(
                      Array("ACTIVE_FROM" => "DESC"), // Сортировка по дате активности, с самой поздней
                      Array("IBLOCK_ID" => 4),
                      false,
                      Array ("nTopCount" => 1)
                  );
                  while ($obLastNews = $arElementLastNews->GetNextElement()) {
                  $arFieldsLastNews = $obLastNews->GetFields();
                  $arPropertiesLastNews = $obLastNews->GetProperties();
                  ?>

              <div class="news_summary__info_last_news-img">
                <img
                  src="<?=CFile::GetPath($arFieldsLastNews['PREVIEW_PICTURE']);?>"
                  alt="<?=$arFieldsLastNews['NAME'];?>"
                />
              </div>
              <?php } ?>
          <ul class="news_summary__info_last_news_list">
              <?php
              $arElementLastNews1 = CIBlockElement::GetList(
                  Array("ACTIVE_FROM" => "DESC"), // Сортировка по дате активности, с самой поздней
                  Array("IBLOCK_ID" => 4),
                  false,
                  Array ("nTopCount" => 2)
              );
              while ($obLastNews1 = $arElementLastNews1->GetNextElement()) {
              $arFieldsLastNews1 = $obLastNews1->GetFields();
              $arPropertiesLastNews1 = $obLastNews1->GetProperties();
              ?>
            <li class="news_summary__info_last_news_list-item">
              <span class="news_summary__info_last_news_list-description"
                ><a href="<?=$arFieldsLastNews1['DETAIL_PAGE_URL'];?>"><?=$arFieldsLastNews1['NAME'];?></a></span
              >
              <span class="news_summary__info_last_news_list-chapter"><a href="<?=$arFieldsLastNews1['DETAIL_PAGE_URL'];?>"><?=$arPropertiesLastNews1['CATEGORY']['VALUE'];?></a></span>
            </li>
              <?php } ?>
          </ul>
        </div>
        <div class="news_summary__projects">
          <div class="news_summary__projects-title">Проекты</div>
          <div class="swiper-container news_summary__projects_slider">
            <div class="news_summary__projects_slider-wrapper swiper-wrapper">

<!--                  --><?php //$GLOBALS['arrFilter'] = array(
//                  'PROPERTY_CHOOSE_NEWS_PROJECT_VALUE' => 'Да'
//                  );
//                  ?><!----><?//$APPLICATION->IncludeComponent("bitrix:news.list", "news-page-list-projects", Array(
//                      "ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
//                      "ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
//                      "AJAX_MODE" => "N",	// Включить режим AJAX
//                      "AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
//                      "AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
//                      "AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
//                      "AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
//                      "CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
//                      "CACHE_GROUPS" => "Y",	// Учитывать права доступа
//                      "CACHE_TIME" => "36000000",	// Время кеширования (сек.)
//                      "CACHE_TYPE" => "A",	// Тип кеширования
//                      "CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
//                      "DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
//                      "DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
//                      "DISPLAY_DATE" => "Y",	// Выводить дату элемента
//                      "DISPLAY_NAME" => "Y",	// Выводить название элемента
//                      "DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
//                      "DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
//                      "DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
//                      "FIELD_CODE" => array(	// Поля
//                          0 => "",
//                          1 => "",
//                      ),
//                      "FILTER_NAME" => "",	// Фильтр
//                      "HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
//                      "IBLOCK_ID" => "3",	// Код информационного блока
//                      "IBLOCK_TYPE" => "Raznoe",	// Тип информационного блока (используется только для проверки)
//                      "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",	// Включать инфоблок в цепочку навигации
//                      "INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
//                      "MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
//                      "NEWS_COUNT" => "10",	// Количество новостей на странице
//                      "PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
//                      "PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
//                      "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
//                      "PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
//                      "PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
//                      "PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
//                      "PAGER_TITLE" => "Новости",	// Название категорий
//                      "PARENT_SECTION" => "",	// ID раздела
//                      "PARENT_SECTION_CODE" => "",	// Код раздела
//                      "PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
//                      "PROPERTY_CODE" => array(	// Свойства
//                          0 => "",
//                          1 => "",
//                      ),
//                      "SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
//                      "SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
//                      "SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
//                      "SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
//                      "SET_STATUS_404" => "N",	// Устанавливать статус 404
//                      "SET_TITLE" => "N",	// Устанавливать заголовок страницы
//                      "SHOW_404" => "N",	// Показ специальной страницы
//                      "SORT_BY1" => "SORT",	// Поле для первой сортировки новостей
//                      "SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
//                      "SORT_ORDER1" => "ASC",	// Направление для первой сортировки новостей
//                      "SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
//                      "STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
//                  ),
//                      false
//                  );?>

                <?php
                $i1 = 0;
                foreach ($arProperties['PROJECTS']['VALUE'] as $projectID) {

                    if ($i1 == 10){
                        break;
                    }else{


                        $arElementProject = CIBlockElement::GetList(
                            Array("SORT" => "ASC"), // Сортировка элементов
                            Array( "IBLOCK_ID" => 3, "ID" => $projectID),
                            false
                        );
                        while ($obProject = $arElementProject->GetNextElement()) {
                            $arPropertiesProject = $obProject->GetProperties();
                            $arFieldsProject = $obProject->GetFields(); ?>
                            <a href="<?=$arFieldsProject['DETAIL_PAGE_URL']?>" class="swiper-slide news_summary__projects-item">
                                <div class="news_summary__project-img">
                                    <img src="<?=CFile::GetPath($arFieldsProject['PREVIEW_PICTURE'])?>" alt="<?=$arFieldsProject["NAME"];?>" />
                                </div>
                                <div class="news_summary__project_info">
                                    <h4 class="news_summary__project-title"><?=$arFieldsProject["NAME"];?></h4>
                                    <div class="news_summary__project-description">
                                        <p><?=$arFieldsProject["PREVIEW_TEXT"];?></p>
                                    </div>
                                </div>
                            </a>
                            <?php
                        }
                    }
                    $i1++;
                }
                ?>

            </div>
          </div>

          <div class="news_summary__projects-navigation">
            <div class="container_svg news_summary__projects-prev">
              <svg
                width="49"
                height="24"
                viewBox="0 0 49 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
                class="arrow-left"
              >
                <path
                  class="arrow-left-path"
                  d="M47 13.5C47.8284 13.5 48.5 12.8284 48.5 12C48.5 11.1716 47.8284 10.5 47 10.5L47 13.5ZM0.939339 10.9393C0.353554 11.5251 0.353554 12.4749 0.939338 13.0607L10.4853 22.6066C11.0711 23.1924 12.0208 23.1924 12.6066 22.6066C13.1924 22.0208 13.1924 21.0711 12.6066 20.4853L4.12132 12L12.6066 3.51471C13.1924 2.92893 13.1924 1.97918 12.6066 1.39339C12.0208 0.807605 11.0711 0.807605 10.4853 1.39339L0.939339 10.9393ZM47 10.5L2 10.5L2 13.5L47 13.5L47 10.5Z"
                  fill="#A1ACB9"
                />
              </svg>
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
            </div>

            <div class="container_svg news_summary__projects-next">
              <svg
                width="49"
                height="24"
                viewBox="0 0 49 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
                class="arrow-right"
              >
                <path
                  class="arrow-right-path"
                  d="M2 10.5C1.17157 10.5 0.5 11.1716 0.5 12C0.5 12.8284 1.17157 13.5 2 13.5L2 10.5ZM48.0607 13.0607C48.6464 12.4749 48.6464 11.5251 48.0607 10.9393L38.5147 1.3934C37.9289 0.807615 36.9792 0.807615 36.3934 1.3934C35.8076 1.97919 35.8076 2.92894 36.3934 3.51472L44.8787 12L36.3934 20.4853C35.8076 21.0711 35.8076 22.0208 36.3934 22.6066C36.9792 23.1924 37.9289 23.1924 38.5147 22.6066L48.0607 13.0607ZM2 13.5L47 13.5L47 10.5L2 10.5L2 13.5Z"
                  fill="#A1ACB9"
                />
              </svg>
              <div class="arrow_fill-next">
                <svg
                  width="49"
                  height="24"
                  viewBox="0 0 49 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                  class="arrow-right"
                >
                  <path
                    d="M2 10.5C1.17157 10.5 0.5 11.1716 0.5 12C0.5 12.8284 1.17157 13.5 2 13.5L2 10.5ZM48.0607 13.0607C48.6464 12.4749 48.6464 11.5251 48.0607 10.9393L38.5147 1.3934C37.9289 0.807615 36.9792 0.807615 36.3934 1.3934C35.8076 1.97919 35.8076 2.92894 36.3934 3.51472L44.8787 12L36.3934 20.4853C35.8076 21.0711 35.8076 22.0208 36.3934 22.6066C36.9792 23.1924 37.9289 23.1924 38.5147 22.6066L48.0607 13.0607ZM2 13.5L47 13.5L47 10.5L2 10.5L2 13.5Z"
                    fill="#A1ACB9"
                  />
                </svg>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="news_company">
    <div class="news_company_container">
      <div class="news_company-title">Новости компании</div>
      <div class="news_company__news">
          <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"news-page-list-news", 
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
		"IBLOCK_ID" => "4",
		"IBLOCK_TYPE" => "Raznoe",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "2",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "moreNews",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "CATEGORY",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "news-page-list-news"
	),
	false
);?>
      </div>
    </div>
  </section>
</section>
<?php } ?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
