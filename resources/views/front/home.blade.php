@extends('front.__layouts.layout')
@section('content')
@include('front.__layouts.header')
<!-- main-slider -->
<div class="main-slider owl-carousel" style="border-radius: 20px;">
    <a href="productCard.html" class="main-slider_item">

    </a>
    <a href="#!" class="main-slider_item">

    </a>
    <a href="#!" class="main-slider_item">

    </a>
    <a href="#!" class="main-slider_item">

    </a>
    <a href="#!" class="main-slider_item">

    </a>
</div>
<!-- healthy info -->
<!-- healthy info -->
<div class="healthy-info container d-md-flex d-none justify-content-between gap-3">
    <div class="healthy-info_card">
        <div class="healthy-info_card--img">
            <img src="image/healthy-info/Group 534812679.png" alt="">
        </div>
        <p>Бесплатная курьерская доставка</p>
    </div>
    <div class="healthy-info_card">
        <div class="healthy-info_card--img">
            <img src="image/healthy-info/Group 534812680.png" alt="">
        </div>
        <p>Акции и скидки </p>
    </div>
    <div class="healthy-info_card">
        <div class="healthy-info_card--img">
            <img src="image/healthy-info/Group 534812681.png" alt="">
        </div>
        <p>Широкий ассортимент</p>
    </div>
</div>
<!-- actual goods -->
<!-- ШАБЛОН КАРТОЧКИ БРАТЬ ТОЛЬКО ИЗ ЭТОГО СЛАЙДЕРА! -->
<section class="actual-goods container">
    <h6 class="title mb-4">Актуальные товары</h6>
    <div class="actual-goods_slider owl-carousel" name="actualGoodsSlider">
        <x-front.product-card-component></x-front.product-card-component>
    </div>
</section>
<!-- popular categories -->
<section class="popular-categories container">
    <div class="title-box d-flex flex-sm-row flex-column gap-sm-5 gap-1 align-items-sm-end align-items-start">
        <h6 class="title">Популярные категории</h6>
        <a href="categories.html" class="title-link">Все категории <svg width="41" height="32" viewBox="0 0 41 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M21.9922 2.26949C24.7543 1.7283 27.6171 2.00617 30.2181 3.06742C32.819 4.12862 35.0399 5.92485 36.6015 8.22698C38.163 10.529 38.9956 13.234 38.9956 16C38.9956 18.766 38.163 21.471 36.6015 23.773C35.0399 26.0751 32.819 27.8714 30.2181 28.9326C27.6171 29.9938 24.7543 30.2717 21.9922 29.7305C19.2302 29.1893 16.6949 27.8539 14.7062 25.8949C14.3123 25.5069 13.6778 25.511 13.289 25.9041C12.9001 26.2971 12.9042 26.9303 13.2981 27.3182C15.5688 29.5549 18.4602 31.0766 21.606 31.693C24.7518 32.3094 28.0126 31.9932 30.9767 30.7838C33.9409 29.5744 36.4765 27.5254 38.2614 24.8941C40.0464 22.2626 41 19.1674 41 16C41 12.8326 40.0464 9.73742 38.2614 7.10592C36.4765 4.47458 33.9409 2.42563 30.9767 1.21621C28.0126 0.00682724 24.7518 -0.309406 21.606 0.306966C18.4602 0.92335 15.5688 2.4451 13.2981 4.68175C12.9042 5.06974 12.9001 5.7029 13.289 6.09593C13.6778 6.48897 14.3123 6.49305 14.7062 6.10505C16.6949 4.14613 19.2302 2.81066 21.9922 2.26949Z" fill=""/>
                <path d="M23.2 8.60007C22.8686 8.15824 22.9582 7.53144 23.4 7.20007C23.8418 6.8687 24.4686 6.95824 24.8 7.40007L30.8 15.4001C31.0667 15.7556 31.0667 16.2445 30.8 16.6001L24.8 24.6001C24.4686 25.0419 23.8418 25.1314 23.4 24.8001C22.9582 24.4687 22.8686 23.8419 23.2 23.4001L28 17H0.988025C0.442355 17 0 16.5523 0 16C0 15.4477 0.442355 15 0.988025 15H28L23.2 8.60007Z" fill=""/>
            </svg>
        </a>
    </div>
    <div class="popular-categories_slider owl-carousel" name="popularCategoriesSlider">

        @foreach($catalogs as $catalog)
        <a href="#!" class="popular-categories_item">
            <div class="popular-categories_item--img">
                <img src="{{ asset('/assets/front/images/circle.svg') }}" alt="" name="popularCategoriesImg">
                <img src="{{ asset('/assets/front/images/category_img.png') }}" alt="">
            </div>
            <p name="popularCategoriesName">{{ $catalog->title }}</p>
        </a>
        @endforeach
    </div>
</section>
<!-- advertising banners -->
<div class="advertising-banners container row gap-3 flex-nowrap justify-content-between">
    <a href="/" class="advertising-banner col-sm-4 col-11" name="advertisingBanner1" style="background: linear-gradient(90deg, #E0C3FC 0%, #8EC5FC 100%);">Реклама</a>
    <a href="/" class="advertising-banner long col-sm-8 col-11" name="advertisingBanner2" style="background: linear-gradient(90deg, #F093FB 0%, #F5576C 100%);">Реклама</a>
</div>
<!-- novelties -->
<section class="novelties container">
    <div class="title-box d-flex flex-sm-row flex-column gap-sm-5 gap-1 align-items-sm-end align-items-start">
        <h6 class="title">Новинки</h6>
        <a href="/" class="title-link">Все новинки <svg width="41" height="32" viewBox="0 0 41 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M21.9922 2.26949C24.7543 1.7283 27.6171 2.00617 30.2181 3.06742C32.819 4.12862 35.0399 5.92485 36.6015 8.22698C38.163 10.529 38.9956 13.234 38.9956 16C38.9956 18.766 38.163 21.471 36.6015 23.773C35.0399 26.0751 32.819 27.8714 30.2181 28.9326C27.6171 29.9938 24.7543 30.2717 21.9922 29.7305C19.2302 29.1893 16.6949 27.8539 14.7062 25.8949C14.3123 25.5069 13.6778 25.511 13.289 25.9041C12.9001 26.2971 12.9042 26.9303 13.2981 27.3182C15.5688 29.5549 18.4602 31.0766 21.606 31.693C24.7518 32.3094 28.0126 31.9932 30.9767 30.7838C33.9409 29.5744 36.4765 27.5254 38.2614 24.8941C40.0464 22.2626 41 19.1674 41 16C41 12.8326 40.0464 9.73742 38.2614 7.10592C36.4765 4.47458 33.9409 2.42563 30.9767 1.21621C28.0126 0.00682724 24.7518 -0.309406 21.606 0.306966C18.4602 0.92335 15.5688 2.4451 13.2981 4.68175C12.9042 5.06974 12.9001 5.7029 13.289 6.09593C13.6778 6.48897 14.3123 6.49305 14.7062 6.10505C16.6949 4.14613 19.2302 2.81066 21.9922 2.26949Z" fill=""/>
                <path d="M23.2 8.60007C22.8686 8.15824 22.9582 7.53144 23.4 7.20007C23.8418 6.8687 24.4686 6.95824 24.8 7.40007L30.8 15.4001C31.0667 15.7556 31.0667 16.2445 30.8 16.6001L24.8 24.6001C24.4686 25.0419 23.8418 25.1314 23.4 24.8001C22.9582 24.4687 22.8686 23.8419 23.2 23.4001L28 17H0.988025C0.442355 17 0 16.5523 0 16C0 15.4477 0.442355 15 0.988025 15H28L23.2 8.60007Z" fill=""/>
            </svg>
        </a>
    </div>
    <div class="d-flex justify-content-between flex-md-row flex-column-reverse">
        <div class="novelties-slider owl-carousel">
            <x-front.product-card-component></x-front.product-card-component>
        </div>
        <a href="/" class="goods-advertising_banner" name="noveltiesAdvertisingBanner">Реклама</a>
    </div>
</section>
<!-- goods-discount -->
<section class="goods-discount container">
    <div class="title-box d-flex flex-sm-row flex-column gap-sm-5 gap-1 align-items-sm-end align-items-start">
        <h6 class="title">Товары со скидкой</h6>
        <a href="/" class="title-link">Все скидки <svg width="41" height="32" viewBox="0 0 41 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M21.9922 2.26949C24.7543 1.7283 27.6171 2.00617 30.2181 3.06742C32.819 4.12862 35.0399 5.92485 36.6015 8.22698C38.163 10.529 38.9956 13.234 38.9956 16C38.9956 18.766 38.163 21.471 36.6015 23.773C35.0399 26.0751 32.819 27.8714 30.2181 28.9326C27.6171 29.9938 24.7543 30.2717 21.9922 29.7305C19.2302 29.1893 16.6949 27.8539 14.7062 25.8949C14.3123 25.5069 13.6778 25.511 13.289 25.9041C12.9001 26.2971 12.9042 26.9303 13.2981 27.3182C15.5688 29.5549 18.4602 31.0766 21.606 31.693C24.7518 32.3094 28.0126 31.9932 30.9767 30.7838C33.9409 29.5744 36.4765 27.5254 38.2614 24.8941C40.0464 22.2626 41 19.1674 41 16C41 12.8326 40.0464 9.73742 38.2614 7.10592C36.4765 4.47458 33.9409 2.42563 30.9767 1.21621C28.0126 0.00682724 24.7518 -0.309406 21.606 0.306966C18.4602 0.92335 15.5688 2.4451 13.2981 4.68175C12.9042 5.06974 12.9001 5.7029 13.289 6.09593C13.6778 6.48897 14.3123 6.49305 14.7062 6.10505C16.6949 4.14613 19.2302 2.81066 21.9922 2.26949Z" fill=""/>
                <path d="M23.2 8.60007C22.8686 8.15824 22.9582 7.53144 23.4 7.20007C23.8418 6.8687 24.4686 6.95824 24.8 7.40007L30.8 15.4001C31.0667 15.7556 31.0667 16.2445 30.8 16.6001L24.8 24.6001C24.4686 25.0419 23.8418 25.1314 23.4 24.8001C22.9582 24.4687 22.8686 23.8419 23.2 23.4001L28 17H0.988025C0.442355 17 0 16.5523 0 16C0 15.4477 0.442355 15 0.988025 15H28L23.2 8.60007Z" fill=""/>
            </svg>
        </a>
    </div>
    <div class="d-flex justify-content-between flex-md-row flex-column">
        <a href="/" class="goods-advertising_banner" name="discountAdvertisingBanner">Реклама</a>
        <div class="goods-discount_slider owl-carousel">
            <x-front.product-card-component></x-front.product-card-component>
        </div>
    </div>
</section>
<!-- healthy info -->
<div class="healthy-info container d-flex flex-md-row flex-column justify-content-between align-items-center gap-3">
    <a href="/" class="healthy-info_card card-bank d-flex gap-2 flex-xl-row flex-md-column flex-row" style="background: linear-gradient(90deg, #F5576C 0%, #8B143A 100%);">
        <img src="{{ asset('/assets/front/images/anorbank (1).png') }}" alt="">
        <img src="{{ asset('/assets/front/images/anorbank (2).png') }}" alt="">
    </a>
    <a href="/" class="healthy-info_card card-bank d-flex gap-2 flex-xl-row flex-md-column flex-row" style="background: linear-gradient(180deg, #FFCE00 0%, #FD6700 100%);">
        <img src="{{ asset('/assets/front/images/alif (2).png') }}" alt="">
        <img src="{{ asset('/assets/front/images/alif (1).png') }}" alt="">
    </a>
    <a href="/" class="healthy-info_card card-bank intend-img d-flex gap-2 flex-xl-row flex-md-column flex-row" style="background: linear-gradient(90deg, #88CEC6 0%, #FFF 100%);">
        <img src="{{ asset('/assets/front/images/intend (2).png') }}" alt="">
        <img src="{{ asset('/assets/front/images/intend (1).png') }}" alt="">
    </a>
</div>
<!-- reccomend -->
<section class="novelties container">
    <h6 class="title" style="margin-bottom: 30px;">рекомендуем</h6>
    <div class="d-flex justify-content-between flex-md-row flex-column-reverse">
        <div class="novelties-slider owl-carousel">
            <x-front.product-card-component></x-front.product-card-component>
        </div>
        <a href="/" class="goods-advertising_banner" name="reccomendAdvertisingBanner">Реклама</a>
    </div>
</section>
<!-- popular -->
<section class="goods-discount container">
    <h6 class="title" style="margin-bottom: 30px;">Популярное</h6>
    <div class="d-flex justify-content-between flex-md-row flex-column">
        <a href="/" class="goods-advertising_banner" name="popularAdvertisingBanner">Реклама</a>
        <div class="goods-discount_slider owl-carousel">
            <x-front.product-card-component></x-front.product-card-component>
        </div>
    </div>
</section>
<!-- advertising banners -->
<div class="advertising-banners container row flex-row-reverse gap-3 flex-nowrap justify-content-between">
    <a href="/" class="advertising-banner col-sm-4 col-11" name="advertisingBanner1" style="background: linear-gradient(90deg, #84FAB0 0%, #8FD3F4 100%);">Реклама</a>
    <a href="/" class="advertising-banner long col-sm-8 col-11" name="advertisingBanner2" style="background: linear-gradient(90deg, #A1C4FD 0%, #C2E9FB 100%);">Реклама</a>
</div>
<!-- Lawn mowers -->
<section class="novelties container">
    <div class="title-box d-flex flex-md-row flex-column gap-sm-5 gap-1 align-items-sm-end align-items-start">
        <h6 class="title">Газонокосилки</h6>
        <a href="/" class="title-link">Все газонокосилки <svg width="41" height="32" viewBox="0 0 41 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M21.9922 2.26949C24.7543 1.7283 27.6171 2.00617 30.2181 3.06742C32.819 4.12862 35.0399 5.92485 36.6015 8.22698C38.163 10.529 38.9956 13.234 38.9956 16C38.9956 18.766 38.163 21.471 36.6015 23.773C35.0399 26.0751 32.819 27.8714 30.2181 28.9326C27.6171 29.9938 24.7543 30.2717 21.9922 29.7305C19.2302 29.1893 16.6949 27.8539 14.7062 25.8949C14.3123 25.5069 13.6778 25.511 13.289 25.9041C12.9001 26.2971 12.9042 26.9303 13.2981 27.3182C15.5688 29.5549 18.4602 31.0766 21.606 31.693C24.7518 32.3094 28.0126 31.9932 30.9767 30.7838C33.9409 29.5744 36.4765 27.5254 38.2614 24.8941C40.0464 22.2626 41 19.1674 41 16C41 12.8326 40.0464 9.73742 38.2614 7.10592C36.4765 4.47458 33.9409 2.42563 30.9767 1.21621C28.0126 0.00682724 24.7518 -0.309406 21.606 0.306966C18.4602 0.92335 15.5688 2.4451 13.2981 4.68175C12.9042 5.06974 12.9001 5.7029 13.289 6.09593C13.6778 6.48897 14.3123 6.49305 14.7062 6.10505C16.6949 4.14613 19.2302 2.81066 21.9922 2.26949Z" fill=""/>
                <path d="M23.2 8.60007C22.8686 8.15824 22.9582 7.53144 23.4 7.20007C23.8418 6.8687 24.4686 6.95824 24.8 7.40007L30.8 15.4001C31.0667 15.7556 31.0667 16.2445 30.8 16.6001L24.8 24.6001C24.4686 25.0419 23.8418 25.1314 23.4 24.8001C22.9582 24.4687 22.8686 23.8419 23.2 23.4001L28 17H0.988025C0.442355 17 0 16.5523 0 16C0 15.4477 0.442355 15 0.988025 15H28L23.2 8.60007Z" fill=""/>
            </svg>
        </a>
    </div>
    <div class="d-flex justify-content-between flex-md-row flex-column-reverse">
        <div class="laptop-slider owl-carousel">
            <x-front.product-card-component></x-front.product-card-component>
        </div>
        <a href="/" class="goods-advertising_banner laptop-banner" name="lawnMowersAdvertisingBanner">Реклама</a>
    </div>
</section>
<!-- laptop -->
<section class="goods-discount container">
    <div class="title-box d-flex flex-sm-row flex-column gap-sm-5 gap-1 align-items-sm-end align-items-start">
        <h6 class="title">Ноутбуки с официальной гарантией</h6>
        <a href="/" class="title-link">Все ноутбуки <svg width="41" height="32" viewBox="0 0 41 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M21.9922 2.26949C24.7543 1.7283 27.6171 2.00617 30.2181 3.06742C32.819 4.12862 35.0399 5.92485 36.6015 8.22698C38.163 10.529 38.9956 13.234 38.9956 16C38.9956 18.766 38.163 21.471 36.6015 23.773C35.0399 26.0751 32.819 27.8714 30.2181 28.9326C27.6171 29.9938 24.7543 30.2717 21.9922 29.7305C19.2302 29.1893 16.6949 27.8539 14.7062 25.8949C14.3123 25.5069 13.6778 25.511 13.289 25.9041C12.9001 26.2971 12.9042 26.9303 13.2981 27.3182C15.5688 29.5549 18.4602 31.0766 21.606 31.693C24.7518 32.3094 28.0126 31.9932 30.9767 30.7838C33.9409 29.5744 36.4765 27.5254 38.2614 24.8941C40.0464 22.2626 41 19.1674 41 16C41 12.8326 40.0464 9.73742 38.2614 7.10592C36.4765 4.47458 33.9409 2.42563 30.9767 1.21621C28.0126 0.00682724 24.7518 -0.309406 21.606 0.306966C18.4602 0.92335 15.5688 2.4451 13.2981 4.68175C12.9042 5.06974 12.9001 5.7029 13.289 6.09593C13.6778 6.48897 14.3123 6.49305 14.7062 6.10505C16.6949 4.14613 19.2302 2.81066 21.9922 2.26949Z" fill=""/>
                <path d="M23.2 8.60007C22.8686 8.15824 22.9582 7.53144 23.4 7.20007C23.8418 6.8687 24.4686 6.95824 24.8 7.40007L30.8 15.4001C31.0667 15.7556 31.0667 16.2445 30.8 16.6001L24.8 24.6001C24.4686 25.0419 23.8418 25.1314 23.4 24.8001C22.9582 24.4687 22.8686 23.8419 23.2 23.4001L28 17H0.988025C0.442355 17 0 16.5523 0 16C0 15.4477 0.442355 15 0.988025 15H28L23.2 8.60007Z" fill=""/>
            </svg>
        </a>
    </div>
    <div class="d-flex justify-content-between flex-md-row flex-column">
        <a href="/" class="goods-advertising_banner laptop-banner" name="laptopAdvertisingBanner">Реклама</a>
        <div class="laptop-slider owl-carousel">
            <x-front.product-card-component></x-front.product-card-component>
        </div>
    </div>
</section>
<!-- mailing  -->
<section class="container ">
    <div class="mailing d-flex justify-content-between align-items-center flex-lg-row flex-column gap-3">
        <div class="mailing-lext d-flex flex-column align-items-lg-start align-items-center">
            <img src="image/whiteLogo.png" alt="">
            <p>Будьте всегда в курсе!</p>
        </div>
        <form action="URL" class="mailing-form">
            <div class="mailing-form_check d-flex gap-3">
                <input type="checkbox" required>
                <p>Ознакомлен(а) с <a href="/">правилами</a> предоставления услуг и согласен(на) на обработку своих персональных данных</p>
            </div>
            <div class="d-flex gap-4 flex-nowrap flex-md-row flex-column">
                <input type="email" class="mailing-email" placeholder="Ваш e-mail" required>
                <button disabled type="submit">Подписаться <svg width="67" height="67" viewBox="0 0 67 67" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.519 56.481C15.0642 61.0262 20.8552 64.1215 27.1596 65.3755C33.4639 66.6295 39.9986 65.9859 45.9372 63.5261C51.8758 61.0662 56.9516 56.9006 60.5228 51.556C64.0939 46.2114 66 39.9279 66 33.5C66 27.0721 64.0939 20.7886 60.5228 15.444C56.9516 10.0994 51.8758 5.93377 45.9372 3.47392C39.9986 1.01407 33.464 0.370459 27.1596 1.62448C20.8552 2.8785 15.0642 5.97382 10.519 10.519"  stroke-width="2" stroke-linecap="round"/>
                        <path d="M28.3333 17L42 33.5M42 33.5L28.3333 50M42 33.5H0.999999"  stroke-width="2" stroke-linecap="round"/>
                    </svg></button>
            </div>
        </form>
    </div>
</section>
<!-- useful -->
<section class="useful container">
    <div class="nav useful-tab_links">
        <a href="#tabNews" data-bs-toggle="tab" class="tabs-links active">Новости</a>
        <a href="#tabStock" data-bs-toggle="tab" class="tabs-links">Акции</a>
        <a href="#tabVideo" data-bs-toggle="tab" class="tabs-links">Видеообзоры</a>
    </div>
    <div class="tab-content useful-tab_content">
        <div class="tab-pane show fade active" id="tabNews">
            <div class="useful-body">
                <a href="/" class="useful-tab">
                    <img src="/image/useful/cashBack.png" alt="">
                    <div class="useful-teb_text">
                        <h6>Теперь у нас есть КэшБек</h6>
                        <p>Совершайте покупки на stab.uz и получите 1% за каждую покупку</p>
                        <div class="useful-tab_link">
                            <p>14 июня 2022</p>
                            <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.3934 26.6066C6.49119 28.7044 9.16393 30.133 12.0736 30.7118C14.9834 31.2906 17.9994 30.9935 20.7403 29.8582C23.4811 28.7229 25.8238 26.8003 27.472 24.3336C29.1203 21.8668 30 18.9667 30 16C30 13.0333 29.1203 10.1332 27.472 7.66645C25.8238 5.19971 23.4811 3.27712 20.7403 2.14181C17.9994 1.00649 14.9834 0.709443 12.0736 1.28822C9.16393 1.867 6.49119 3.29561 4.3934 5.3934" stroke-width="2" stroke-linecap="round"/><path d="M13.5 8.5L19.5 16M19.5 16L13.5 23.5M19.5 16H1.5" stroke-width="2" stroke-linecap="round"/></svg>
                        </div>
                    </div>
                </a>
                <a href="/" class="useful-tab">
                    <img src="/image/useful/proccent.png" alt="">
                    <div class="useful-teb_text">
                        <h6>It has survived not only five centuries</h6>
                        <p>Sometimes by accident Vario versions have evolved over the years</p>
                        <div class="useful-tab_link">
                            <p>14 июня 2022</p>
                            <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.3934 26.6066C6.49119 28.7044 9.16393 30.133 12.0736 30.7118C14.9834 31.2906 17.9994 30.9935 20.7403 29.8582C23.4811 28.7229 25.8238 26.8003 27.472 24.3336C29.1203 21.8668 30 18.9667 30 16C30 13.0333 29.1203 10.1332 27.472 7.66645C25.8238 5.19971 23.4811 3.27712 20.7403 2.14181C17.9994 1.00649 14.9834 0.709443 12.0736 1.28822C9.16393 1.867 6.49119 3.29561 4.3934 5.3934" stroke-width="2" stroke-linecap="round"/><path d="M13.5 8.5L19.5 16M19.5 16L13.5 23.5M19.5 16H1.5" stroke-width="2" stroke-linecap="round"/></svg>
                        </div>
                    </div>
                </a>
            </div>
            <a href="/" class="title-link mt-4 d-block">Все новости <svg width="41" height="32" viewBox="0 0 41 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M21.9922 2.26949C24.7543 1.7283 27.6171 2.00617 30.2181 3.06742C32.819 4.12862 35.0399 5.92485 36.6015 8.22698C38.163 10.529 38.9956 13.234 38.9956 16C38.9956 18.766 38.163 21.471 36.6015 23.773C35.0399 26.0751 32.819 27.8714 30.2181 28.9326C27.6171 29.9938 24.7543 30.2717 21.9922 29.7305C19.2302 29.1893 16.6949 27.8539 14.7062 25.8949C14.3123 25.5069 13.6778 25.511 13.289 25.9041C12.9001 26.2971 12.9042 26.9303 13.2981 27.3182C15.5688 29.5549 18.4602 31.0766 21.606 31.693C24.7518 32.3094 28.0126 31.9932 30.9767 30.7838C33.9409 29.5744 36.4765 27.5254 38.2614 24.8941C40.0464 22.2626 41 19.1674 41 16C41 12.8326 40.0464 9.73742 38.2614 7.10592C36.4765 4.47458 33.9409 2.42563 30.9767 1.21621C28.0126 0.00682724 24.7518 -0.309406 21.606 0.306966C18.4602 0.92335 15.5688 2.4451 13.2981 4.68175C12.9042 5.06974 12.9001 5.7029 13.289 6.09593C13.6778 6.48897 14.3123 6.49305 14.7062 6.10505C16.6949 4.14613 19.2302 2.81066 21.9922 2.26949Z" fill=""/>
                    <path d="M23.2 8.60007C22.8686 8.15824 22.9582 7.53144 23.4 7.20007C23.8418 6.8687 24.4686 6.95824 24.8 7.40007L30.8 15.4001C31.0667 15.7556 31.0667 16.2445 30.8 16.6001L24.8 24.6001C24.4686 25.0419 23.8418 25.1314 23.4 24.8001C22.9582 24.4687 22.8686 23.8419 23.2 23.4001L28 17H0.988025C0.442355 17 0 16.5523 0 16C0 15.4477 0.442355 15 0.988025 15H28L23.2 8.60007Z" fill=""/>
                </svg>
            </a>
        </div>
        <div class="tab-pane show fade" id="tabStock">
            <div class="useful-body">
                <a href="/" class="useful-tab">
                    <img src="/image/useful/cashBack.png" alt="">
                    <div class="useful-teb_text">
                        <h6>Теперь у нас есть КэшБек</h6>
                        <p>Совершайте покупки на stab.uz и получите 1% за каждую покупку</p>
                        <div class="useful-tab_link">
                            <p>14 июня 2022</p>
                            <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.3934 26.6066C6.49119 28.7044 9.16393 30.133 12.0736 30.7118C14.9834 31.2906 17.9994 30.9935 20.7403 29.8582C23.4811 28.7229 25.8238 26.8003 27.472 24.3336C29.1203 21.8668 30 18.9667 30 16C30 13.0333 29.1203 10.1332 27.472 7.66645C25.8238 5.19971 23.4811 3.27712 20.7403 2.14181C17.9994 1.00649 14.9834 0.709443 12.0736 1.28822C9.16393 1.867 6.49119 3.29561 4.3934 5.3934" stroke-width="2" stroke-linecap="round"/><path d="M13.5 8.5L19.5 16M19.5 16L13.5 23.5M19.5 16H1.5" stroke-width="2" stroke-linecap="round"/></svg>
                        </div>
                    </div>
                </a>
                <a href="/" class="useful-tab">
                    <img src="/image/useful/proccent.png" alt="">
                    <div class="useful-teb_text">
                        <h6>It has survived not only five centuries</h6>
                        <p>Sometimes by accident Vario versions have evolved over the years</p>
                        <div class="useful-tab_link">
                            <p>14 июня 2022</p>
                            <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.3934 26.6066C6.49119 28.7044 9.16393 30.133 12.0736 30.7118C14.9834 31.2906 17.9994 30.9935 20.7403 29.8582C23.4811 28.7229 25.8238 26.8003 27.472 24.3336C29.1203 21.8668 30 18.9667 30 16C30 13.0333 29.1203 10.1332 27.472 7.66645C25.8238 5.19971 23.4811 3.27712 20.7403 2.14181C17.9994 1.00649 14.9834 0.709443 12.0736 1.28822C9.16393 1.867 6.49119 3.29561 4.3934 5.3934" stroke-width="2" stroke-linecap="round"/><path d="M13.5 8.5L19.5 16M19.5 16L13.5 23.5M19.5 16H1.5" stroke-width="2" stroke-linecap="round"/></svg>
                        </div>
                    </div>
                </a>
            </div>
            <a href="/" class="title-link mt-4 d-block">Все акции <svg width="41" height="32" viewBox="0 0 41 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M21.9922 2.26949C24.7543 1.7283 27.6171 2.00617 30.2181 3.06742C32.819 4.12862 35.0399 5.92485 36.6015 8.22698C38.163 10.529 38.9956 13.234 38.9956 16C38.9956 18.766 38.163 21.471 36.6015 23.773C35.0399 26.0751 32.819 27.8714 30.2181 28.9326C27.6171 29.9938 24.7543 30.2717 21.9922 29.7305C19.2302 29.1893 16.6949 27.8539 14.7062 25.8949C14.3123 25.5069 13.6778 25.511 13.289 25.9041C12.9001 26.2971 12.9042 26.9303 13.2981 27.3182C15.5688 29.5549 18.4602 31.0766 21.606 31.693C24.7518 32.3094 28.0126 31.9932 30.9767 30.7838C33.9409 29.5744 36.4765 27.5254 38.2614 24.8941C40.0464 22.2626 41 19.1674 41 16C41 12.8326 40.0464 9.73742 38.2614 7.10592C36.4765 4.47458 33.9409 2.42563 30.9767 1.21621C28.0126 0.00682724 24.7518 -0.309406 21.606 0.306966C18.4602 0.92335 15.5688 2.4451 13.2981 4.68175C12.9042 5.06974 12.9001 5.7029 13.289 6.09593C13.6778 6.48897 14.3123 6.49305 14.7062 6.10505C16.6949 4.14613 19.2302 2.81066 21.9922 2.26949Z" fill=""/>
                    <path d="M23.2 8.60007C22.8686 8.15824 22.9582 7.53144 23.4 7.20007C23.8418 6.8687 24.4686 6.95824 24.8 7.40007L30.8 15.4001C31.0667 15.7556 31.0667 16.2445 30.8 16.6001L24.8 24.6001C24.4686 25.0419 23.8418 25.1314 23.4 24.8001C22.9582 24.4687 22.8686 23.8419 23.2 23.4001L28 17H0.988025C0.442355 17 0 16.5523 0 16C0 15.4477 0.442355 15 0.988025 15H28L23.2 8.60007Z" fill=""/>
                </svg>
            </a>
        </div>
        <div class="tab-pane show fade" id="tabVideo">
            <div class="useful-body">
                <a href="/" class="useful-tab">
                    <img src="/image/useful/cashBack.png" alt="">
                    <div class="useful-teb_text">
                        <h6>Теперь у нас есть КэшБек</h6>
                        <p>Совершайте покупки на stab.uz и получите 1% за каждую покупку</p>
                        <div class="useful-tab_link">
                            <p>14 июня 2022</p>
                            <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.3934 26.6066C6.49119 28.7044 9.16393 30.133 12.0736 30.7118C14.9834 31.2906 17.9994 30.9935 20.7403 29.8582C23.4811 28.7229 25.8238 26.8003 27.472 24.3336C29.1203 21.8668 30 18.9667 30 16C30 13.0333 29.1203 10.1332 27.472 7.66645C25.8238 5.19971 23.4811 3.27712 20.7403 2.14181C17.9994 1.00649 14.9834 0.709443 12.0736 1.28822C9.16393 1.867 6.49119 3.29561 4.3934 5.3934" stroke-width="2" stroke-linecap="round"/><path d="M13.5 8.5L19.5 16M19.5 16L13.5 23.5M19.5 16H1.5" stroke-width="2" stroke-linecap="round"/></svg>
                        </div>
                    </div>
                </a>
                <a href="/" class="useful-tab">
                    <img src="/image/useful/proccent.png" alt="">
                    <div class="useful-teb_text">
                        <h6>It has survived not only five centuries</h6>
                        <p>Sometimes by accident Vario versions have evolved over the years</p>
                        <div class="useful-tab_link">
                            <p>14 июня 2022</p>
                            <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.3934 26.6066C6.49119 28.7044 9.16393 30.133 12.0736 30.7118C14.9834 31.2906 17.9994 30.9935 20.7403 29.8582C23.4811 28.7229 25.8238 26.8003 27.472 24.3336C29.1203 21.8668 30 18.9667 30 16C30 13.0333 29.1203 10.1332 27.472 7.66645C25.8238 5.19971 23.4811 3.27712 20.7403 2.14181C17.9994 1.00649 14.9834 0.709443 12.0736 1.28822C9.16393 1.867 6.49119 3.29561 4.3934 5.3934" stroke-width="2" stroke-linecap="round"/><path d="M13.5 8.5L19.5 16M19.5 16L13.5 23.5M19.5 16H1.5" stroke-width="2" stroke-linecap="round"/></svg>
                        </div>
                    </div>
                </a>
            </div>
            <a href="/" class="title-link mt-4 d-block">Все видеообзоры <svg width="41" height="32" viewBox="0 0 41 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M21.9922 2.26949C24.7543 1.7283 27.6171 2.00617 30.2181 3.06742C32.819 4.12862 35.0399 5.92485 36.6015 8.22698C38.163 10.529 38.9956 13.234 38.9956 16C38.9956 18.766 38.163 21.471 36.6015 23.773C35.0399 26.0751 32.819 27.8714 30.2181 28.9326C27.6171 29.9938 24.7543 30.2717 21.9922 29.7305C19.2302 29.1893 16.6949 27.8539 14.7062 25.8949C14.3123 25.5069 13.6778 25.511 13.289 25.9041C12.9001 26.2971 12.9042 26.9303 13.2981 27.3182C15.5688 29.5549 18.4602 31.0766 21.606 31.693C24.7518 32.3094 28.0126 31.9932 30.9767 30.7838C33.9409 29.5744 36.4765 27.5254 38.2614 24.8941C40.0464 22.2626 41 19.1674 41 16C41 12.8326 40.0464 9.73742 38.2614 7.10592C36.4765 4.47458 33.9409 2.42563 30.9767 1.21621C28.0126 0.00682724 24.7518 -0.309406 21.606 0.306966C18.4602 0.92335 15.5688 2.4451 13.2981 4.68175C12.9042 5.06974 12.9001 5.7029 13.289 6.09593C13.6778 6.48897 14.3123 6.49305 14.7062 6.10505C16.6949 4.14613 19.2302 2.81066 21.9922 2.26949Z" fill=""/>
                    <path d="M23.2 8.60007C22.8686 8.15824 22.9582 7.53144 23.4 7.20007C23.8418 6.8687 24.4686 6.95824 24.8 7.40007L30.8 15.4001C31.0667 15.7556 31.0667 16.2445 30.8 16.6001L24.8 24.6001C24.4686 25.0419 23.8418 25.1314 23.4 24.8001C22.9582 24.4687 22.8686 23.8419 23.2 23.4001L28 17H0.988025C0.442355 17 0 16.5523 0 16C0 15.4477 0.442355 15 0.988025 15H28L23.2 8.60007Z" fill=""/>
                </svg>
            </a>
        </div>
    </div>
</section>
<!-- popular brands -->
<section class="popular-brands container">
    <div class="title-box d-flex flex-sm-row flex-column gap-sm-5 gap-1 align-items-sm-end align-items-start">
        <h6 class="title">Популярные бренды</h6>
        <a href="/" class="title-link">Все бренды <svg width="41" height="32" viewBox="0 0 41 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M21.9922 2.26949C24.7543 1.7283 27.6171 2.00617 30.2181 3.06742C32.819 4.12862 35.0399 5.92485 36.6015 8.22698C38.163 10.529 38.9956 13.234 38.9956 16C38.9956 18.766 38.163 21.471 36.6015 23.773C35.0399 26.0751 32.819 27.8714 30.2181 28.9326C27.6171 29.9938 24.7543 30.2717 21.9922 29.7305C19.2302 29.1893 16.6949 27.8539 14.7062 25.8949C14.3123 25.5069 13.6778 25.511 13.289 25.9041C12.9001 26.2971 12.9042 26.9303 13.2981 27.3182C15.5688 29.5549 18.4602 31.0766 21.606 31.693C24.7518 32.3094 28.0126 31.9932 30.9767 30.7838C33.9409 29.5744 36.4765 27.5254 38.2614 24.8941C40.0464 22.2626 41 19.1674 41 16C41 12.8326 40.0464 9.73742 38.2614 7.10592C36.4765 4.47458 33.9409 2.42563 30.9767 1.21621C28.0126 0.00682724 24.7518 -0.309406 21.606 0.306966C18.4602 0.92335 15.5688 2.4451 13.2981 4.68175C12.9042 5.06974 12.9001 5.7029 13.289 6.09593C13.6778 6.48897 14.3123 6.49305 14.7062 6.10505C16.6949 4.14613 19.2302 2.81066 21.9922 2.26949Z" fill=""/>
                <path d="M23.2 8.60007C22.8686 8.15824 22.9582 7.53144 23.4 7.20007C23.8418 6.8687 24.4686 6.95824 24.8 7.40007L30.8 15.4001C31.0667 15.7556 31.0667 16.2445 30.8 16.6001L24.8 24.6001C24.4686 25.0419 23.8418 25.1314 23.4 24.8001C22.9582 24.4687 22.8686 23.8419 23.2 23.4001L28 17H0.988025C0.442355 17 0 16.5523 0 16C0 15.4477 0.442355 15 0.988025 15H28L23.2 8.60007Z" fill=""/>
            </svg>
        </a>
    </div>
    <div class="popular-categories_slider owl-carousel" name="popularBrandsSlider">
        @foreach($brands as $brand)
            <a href="#!" class="popular-brand_item">
                <img src="{{ $brand->brand_logo }}" alt="">
            </a>
        @endforeach
    </div>
</section>
<!-- recently viewed -->
<section class="actual-goods container">
    <h6 class="title mb-sm-5 bm-3">Недавно просмотренные товары</h6>
    <div class="actual-goods_slider owl-carousel" name="recentlyViewedSlider">
        <x-front.product-card-component></x-front.product-card-component>
    </div>
</section>
<!-- pickup points -->
<section class="pickup-points container">
    <h6 class="title mb-sm-5 bm-3">Пункты самовывоза</h6>
    <div class="pickup-points_main d-flex justify-content-between flex-lg-row flex-column gap-lg-0 gap-4">
        <div class="pickup-points_points row justify-content-between col-xl-7 col-lg-6 col-12">
            <div class="pickup-points_point col-xl-6 col-lg-12 col-md-6 col-12">
                <div>
                    <h6>Ташкент</h6>
                    <p>Алмазарский район, ул. Уста Ширин, 134, магазин № 12</p>
                </div>
                <a href="/" class="d-flex gap-2 align-items-center">
                    <span>На карте</span>
                    <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.1967 13.8033C7.24559 14.8522 8.58197 15.5665 10.0368 15.8559C11.4917 16.1453 12.9997 15.9968 14.3701 15.4291C15.7406 14.8614 16.9119 13.9001 17.736 12.6668C18.5601 11.4334 19 9.98336 19 8.5C19 7.01664 18.5601 5.56659 17.736 4.33322C16.9119 3.09986 15.7406 2.13856 14.3701 1.5709C12.9997 1.00325 11.4917 0.854721 10.0368 1.14411C8.58197 1.4335 7.24559 2.1478 6.1967 3.1967" stroke="#2D8D00" stroke-linecap="round"/>
                        <path d="M11.2143 5L14 8.5M14 8.5L11.2143 12M14 8.5H1" stroke="#2D8D00" stroke-linecap="round"/>
                    </svg>
                </a>
            </div>
            <div class="pickup-points_point col-xl-6 col-lg-12 col-md-6 col-12">
                <div>
                    <h6>Ташкент</h6>
                    <p>Яшнабадский район, строительный рынок «Куйлюк», павильон 2, магазин № 63</p>
                </div>
                <a href="/" class="d-flex gap-2 align-items-center">
                    <span>На карте</span>
                    <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.1967 13.8033C7.24559 14.8522 8.58197 15.5665 10.0368 15.8559C11.4917 16.1453 12.9997 15.9968 14.3701 15.4291C15.7406 14.8614 16.9119 13.9001 17.736 12.6668C18.5601 11.4334 19 9.98336 19 8.5C19 7.01664 18.5601 5.56659 17.736 4.33322C16.9119 3.09986 15.7406 2.13856 14.3701 1.5709C12.9997 1.00325 11.4917 0.854721 10.0368 1.14411C8.58197 1.4335 7.24559 2.1478 6.1967 3.1967" stroke="#2D8D00" stroke-linecap="round"/>
                        <path d="M11.2143 5L14 8.5M14 8.5L11.2143 12M14 8.5H1" stroke="#2D8D00" stroke-linecap="round"/>
                    </svg>
                </a>
            </div>
            <div class="pickup-points_point col-xl-4 col-lg-12 col-md-4 col-12">
                <div>
                    <h6>Самарканд</h6>
                    <p>ул. Туркистон, 62А, махалля Юкорий Хужа</p>
                </div>
                <a href="/" class="d-flex gap-2 align-items-center">
                    <span>На карте</span>
                    <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.1967 13.8033C7.24559 14.8522 8.58197 15.5665 10.0368 15.8559C11.4917 16.1453 12.9997 15.9968 14.3701 15.4291C15.7406 14.8614 16.9119 13.9001 17.736 12.6668C18.5601 11.4334 19 9.98336 19 8.5C19 7.01664 18.5601 5.56659 17.736 4.33322C16.9119 3.09986 15.7406 2.13856 14.3701 1.5709C12.9997 1.00325 11.4917 0.854721 10.0368 1.14411C8.58197 1.4335 7.24559 2.1478 6.1967 3.1967" stroke="#2D8D00" stroke-linecap="round"/>
                        <path d="M11.2143 5L14 8.5M14 8.5L11.2143 12M14 8.5H1" stroke="#2D8D00" stroke-linecap="round"/>
                    </svg>
                </a>
            </div>
            <div class="pickup-points_point col-xl-4 col-lg-6 col-md-4 col-12">
                <div>
                    <h6>Бухара</h6>
                    <p>ул. Шохруб, 115 (ор-р — мечеть Файзобад)</p>
                </div>
                <a href="/" class="d-flex gap-2 align-items-center">
                    <span>На карте</span>
                    <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.1967 13.8033C7.24559 14.8522 8.58197 15.5665 10.0368 15.8559C11.4917 16.1453 12.9997 15.9968 14.3701 15.4291C15.7406 14.8614 16.9119 13.9001 17.736 12.6668C18.5601 11.4334 19 9.98336 19 8.5C19 7.01664 18.5601 5.56659 17.736 4.33322C16.9119 3.09986 15.7406 2.13856 14.3701 1.5709C12.9997 1.00325 11.4917 0.854721 10.0368 1.14411C8.58197 1.4335 7.24559 2.1478 6.1967 3.1967" stroke="#2D8D00" stroke-linecap="round"/>
                        <path d="M11.2143 5L14 8.5M14 8.5L11.2143 12M14 8.5H1" stroke="#2D8D00" stroke-linecap="round"/>
                    </svg>
                </a>
            </div>
            <div class="pickup-points_point col-xl-4 col-lg-6 col-md-4 col-12">
                <div>
                    <h6>Андижан</h6>
                    <p>ул. Пирмухамедова, 96, этаж 2, «Шинам», магазин № 187</p>
                </div>
                <a href="/" class="d-flex gap-2 align-items-center">
                    <span>На карте</span>
                    <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.1967 13.8033C7.24559 14.8522 8.58197 15.5665 10.0368 15.8559C11.4917 16.1453 12.9997 15.9968 14.3701 15.4291C15.7406 14.8614 16.9119 13.9001 17.736 12.6668C18.5601 11.4334 19 9.98336 19 8.5C19 7.01664 18.5601 5.56659 17.736 4.33322C16.9119 3.09986 15.7406 2.13856 14.3701 1.5709C12.9997 1.00325 11.4917 0.854721 10.0368 1.14411C8.58197 1.4335 7.24559 2.1478 6.1967 3.1967" stroke="#2D8D00" stroke-linecap="round"/>
                        <path d="M11.2143 5L14 8.5M14 8.5L11.2143 12M14 8.5H1" stroke="#2D8D00" stroke-linecap="round"/>
                    </svg>
                </a>
            </div>
        </div>
        <div class="pickup-points_map col-xl-5 col-lg-6 col-12">
            <div style="position:relative;overflow:hidden;"><a href="https://yandex.uz/maps/org/stab_uz/187208734623/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Stab. uz</a><a href="https://yandex.uz/maps/10335/tashkent/category/electrical_products/184107066/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:14px;">Электротехническая продукция в Ташкенте</a><iframe src="https://yandex.uz/map-widget/v1/?ll=69.250263%2C41.355994&mode=search&oid=187208734623&ol=biz&z=16.69" width="100%"  frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>
        </div>
    </div>
</section>
<!-- stab -->
<div class="stab container">
    <h6 class="title mb-sm-4 mb-2">Stab.Uz — Интернет-магазин электротехнического оборудования</h6>
    <p class="stab-text">Онлайн-мегамаркет Stab.Uz — уникальный проект, представляющий десятки тысяч товаров непродовольственной группы от более сотни брендов. В каталоге представлены позиции по всем востребованным на современном рынке категориям. К нам обращаются те, кто ищет в Узбекистане <a href="/">Интернет-магазин</a>Онлайн-мегамаркет Stab.Uz — уникальный проект, представляющий десятки тысяч товаров непродовольственной группы от более сотни брендов. Онлайн-мегамаркет Stab.Uz — уникальный проект, представляющий десятки тысяч товаров непродовольственной группы от более сотни брендов.</p>
    <button class="stab-btn">Развернуть<img class="icon" src="image/icons/arrRight.png" alt="arrow down"></button>
</div>
<!-- faq -->
<section class="faq container">
    <h6 class="title mb-sm-4 mb-2">FAQ: популярные вопросы покупателей на Stab.Uz</h6>
    <div class="faq-accordion">
        <div class="faq-accordion-item">
            <div class="faq-accordion-header">
                <div class="faq-accordion-arrow">
                    <svg width="41" height="32" viewBox="0 0 41 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M21.9922 2.26949C24.7543 1.7283 27.6171 2.00617 30.2181 3.06742C32.819 4.12862 35.0399 5.92485 36.6015 8.22698C38.163 10.529 38.9956 13.234 38.9956 16C38.9956 18.766 38.163 21.471 36.6015 23.773C35.0399 26.0751 32.819 27.8714 30.2181 28.9326C27.6171 29.9938 24.7543 30.2717 21.9922 29.7305C19.2302 29.1893 16.6949 27.8539 14.7062 25.8949C14.3123 25.5069 13.6778 25.511 13.289 25.9041C12.9001 26.2971 12.9042 26.9303 13.2981 27.3182C15.5688 29.5549 18.4602 31.0766 21.606 31.693C24.7518 32.3094 28.0126 31.9932 30.9767 30.7838C33.9409 29.5744 36.4765 27.5254 38.2614 24.8941C40.0464 22.2626 41 19.1674 41 16C41 12.8326 40.0464 9.73742 38.2614 7.10592C36.4765 4.47458 33.9409 2.42563 30.9767 1.21621C28.0126 0.00682724 24.7518 -0.309406 21.606 0.306966C18.4602 0.92335 15.5688 2.4451 13.2981 4.68175C12.9042 5.06974 12.9001 5.7029 13.289 6.09593C13.6778 6.48897 14.3123 6.49305 14.7062 6.10505C16.6949 4.14613 19.2302 2.81066 21.9922 2.26949Z"/>
                        <path d="M23.2 8.60007C22.8686 8.15824 22.9582 7.53144 23.4 7.20007C23.8418 6.8687 24.4686 6.95824 24.8 7.40007L30.8 15.4001C31.0667 15.7556 31.0667 16.2445 30.8 16.6001L24.8 24.6001C24.4686 25.0419 23.8418 25.1314 23.4 24.8001C22.9582 24.4687 22.8686 23.8419 23.2 23.4001L28 17H0.988025C0.442355 17 0 16.5523 0 16C0 15.4477 0.442355 15 0.988025 15H28L23.2 8.60007Z"/>
                    </svg>
                </div>
                <h5>Сколько времени занимает доставка и сколько стоит такая услуга?</h5>
            </div>
            <div class="faq-accordion-content">
                <p>Зарегистрированный аккаунт позволяет быстро оформлять заказы (вам не придется каждый раз заполнять все поля), просматривать историю покупок, получать кешбэк и участвовать в других акциях компании</p>
            </div>
        </div>
        <div class="faq-accordion-item">
            <div class="faq-accordion-header">
                <div class="faq-accordion-arrow">
                    <svg width="41" height="32" viewBox="0 0 41 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M21.9922 2.26949C24.7543 1.7283 27.6171 2.00617 30.2181 3.06742C32.819 4.12862 35.0399 5.92485 36.6015 8.22698C38.163 10.529 38.9956 13.234 38.9956 16C38.9956 18.766 38.163 21.471 36.6015 23.773C35.0399 26.0751 32.819 27.8714 30.2181 28.9326C27.6171 29.9938 24.7543 30.2717 21.9922 29.7305C19.2302 29.1893 16.6949 27.8539 14.7062 25.8949C14.3123 25.5069 13.6778 25.511 13.289 25.9041C12.9001 26.2971 12.9042 26.9303 13.2981 27.3182C15.5688 29.5549 18.4602 31.0766 21.606 31.693C24.7518 32.3094 28.0126 31.9932 30.9767 30.7838C33.9409 29.5744 36.4765 27.5254 38.2614 24.8941C40.0464 22.2626 41 19.1674 41 16C41 12.8326 40.0464 9.73742 38.2614 7.10592C36.4765 4.47458 33.9409 2.42563 30.9767 1.21621C28.0126 0.00682724 24.7518 -0.309406 21.606 0.306966C18.4602 0.92335 15.5688 2.4451 13.2981 4.68175C12.9042 5.06974 12.9001 5.7029 13.289 6.09593C13.6778 6.48897 14.3123 6.49305 14.7062 6.10505C16.6949 4.14613 19.2302 2.81066 21.9922 2.26949Z"/>
                        <path d="M23.2 8.60007C22.8686 8.15824 22.9582 7.53144 23.4 7.20007C23.8418 6.8687 24.4686 6.95824 24.8 7.40007L30.8 15.4001C31.0667 15.7556 31.0667 16.2445 30.8 16.6001L24.8 24.6001C24.4686 25.0419 23.8418 25.1314 23.4 24.8001C22.9582 24.4687 22.8686 23.8419 23.2 23.4001L28 17H0.988025C0.442355 17 0 16.5523 0 16C0 15.4477 0.442355 15 0.988025 15H28L23.2 8.60007Z"/>
                    </svg>
                </div>
                <h5>Для чего нужна регистрация в вашем онлайн-мегамаркете?</h5>
            </div>
            <div class="faq-accordion-content">
                <p>Зарегистрированный аккаунт позволяет быстро оформлять заказы (вам не придется каждый раз заполнять все поля), просматривать историю покупок, получать кешбэк и участвовать в других акциях компании</p>
            </div>
        </div>
        <div class="faq-accordion-item">
            <div class="faq-accordion-header">
                <div class="faq-accordion-arrow">
                    <svg width="41" height="32" viewBox="0 0 41 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M21.9922 2.26949C24.7543 1.7283 27.6171 2.00617 30.2181 3.06742C32.819 4.12862 35.0399 5.92485 36.6015 8.22698C38.163 10.529 38.9956 13.234 38.9956 16C38.9956 18.766 38.163 21.471 36.6015 23.773C35.0399 26.0751 32.819 27.8714 30.2181 28.9326C27.6171 29.9938 24.7543 30.2717 21.9922 29.7305C19.2302 29.1893 16.6949 27.8539 14.7062 25.8949C14.3123 25.5069 13.6778 25.511 13.289 25.9041C12.9001 26.2971 12.9042 26.9303 13.2981 27.3182C15.5688 29.5549 18.4602 31.0766 21.606 31.693C24.7518 32.3094 28.0126 31.9932 30.9767 30.7838C33.9409 29.5744 36.4765 27.5254 38.2614 24.8941C40.0464 22.2626 41 19.1674 41 16C41 12.8326 40.0464 9.73742 38.2614 7.10592C36.4765 4.47458 33.9409 2.42563 30.9767 1.21621C28.0126 0.00682724 24.7518 -0.309406 21.606 0.306966C18.4602 0.92335 15.5688 2.4451 13.2981 4.68175C12.9042 5.06974 12.9001 5.7029 13.289 6.09593C13.6778 6.48897 14.3123 6.49305 14.7062 6.10505C16.6949 4.14613 19.2302 2.81066 21.9922 2.26949Z"/>
                        <path d="M23.2 8.60007C22.8686 8.15824 22.9582 7.53144 23.4 7.20007C23.8418 6.8687 24.4686 6.95824 24.8 7.40007L30.8 15.4001C31.0667 15.7556 31.0667 16.2445 30.8 16.6001L24.8 24.6001C24.4686 25.0419 23.8418 25.1314 23.4 24.8001C22.9582 24.4687 22.8686 23.8419 23.2 23.4001L28 17H0.988025C0.442355 17 0 16.5523 0 16C0 15.4477 0.442355 15 0.988025 15H28L23.2 8.60007Z"/>
                    </svg>
                </div>
                <h5>Какие способы оплаты вы предлагаете?</h5>
            </div>
            <div class="faq-accordion-content">
                <p>Зарегистрированный аккаунт позволяет быстро оформлять заказы (вам не придется каждый раз заполнять все поля), просматривать историю покупок, получать кешбэк и участвовать в других акциях компании</p>
            </div>
        </div>
        <div class="faq-accordion-item">
            <div class="faq-accordion-header">
                <div class="faq-accordion-arrow">
                    <svg width="41" height="32" viewBox="0 0 41 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M21.9922 2.26949C24.7543 1.7283 27.6171 2.00617 30.2181 3.06742C32.819 4.12862 35.0399 5.92485 36.6015 8.22698C38.163 10.529 38.9956 13.234 38.9956 16C38.9956 18.766 38.163 21.471 36.6015 23.773C35.0399 26.0751 32.819 27.8714 30.2181 28.9326C27.6171 29.9938 24.7543 30.2717 21.9922 29.7305C19.2302 29.1893 16.6949 27.8539 14.7062 25.8949C14.3123 25.5069 13.6778 25.511 13.289 25.9041C12.9001 26.2971 12.9042 26.9303 13.2981 27.3182C15.5688 29.5549 18.4602 31.0766 21.606 31.693C24.7518 32.3094 28.0126 31.9932 30.9767 30.7838C33.9409 29.5744 36.4765 27.5254 38.2614 24.8941C40.0464 22.2626 41 19.1674 41 16C41 12.8326 40.0464 9.73742 38.2614 7.10592C36.4765 4.47458 33.9409 2.42563 30.9767 1.21621C28.0126 0.00682724 24.7518 -0.309406 21.606 0.306966C18.4602 0.92335 15.5688 2.4451 13.2981 4.68175C12.9042 5.06974 12.9001 5.7029 13.289 6.09593C13.6778 6.48897 14.3123 6.49305 14.7062 6.10505C16.6949 4.14613 19.2302 2.81066 21.9922 2.26949Z"/>
                        <path d="M23.2 8.60007C22.8686 8.15824 22.9582 7.53144 23.4 7.20007C23.8418 6.8687 24.4686 6.95824 24.8 7.40007L30.8 15.4001C31.0667 15.7556 31.0667 16.2445 30.8 16.6001L24.8 24.6001C24.4686 25.0419 23.8418 25.1314 23.4 24.8001C22.9582 24.4687 22.8686 23.8419 23.2 23.4001L28 17H0.988025C0.442355 17 0 16.5523 0 16C0 15.4477 0.442355 15 0.988025 15H28L23.2 8.60007Z"/>
                    </svg>
                </div>
                <h5>Чем отличается покупка товара в вашем онлайн-магазине в кредит от приобретения товара в рассрочку?</h5>
            </div>
            <div class="faq-accordion-content">
                <p>Зарегистрированный аккаунт позволяет быстро оформлять заказы (вам не придется каждый раз заполнять все поля), просматривать историю покупок, получать кешбэк и участвовать в других акциях компании</p>
            </div>
        </div>
    </div>
</section>
<!-- mailing  -->
<section class="mailing-container container">
    <div class="mailing">
        <div class="healthy-info d-md-none d-flex flex-wrap justify-content-between gap-3">
            <div class="healthy-info_card flex-row">
                <div class="healthy-info_card--img">
                    <img src="image/healthy-info/Group 534812679.png" alt="">
                </div>
                <p>Бесплатная курьерская доставка</p>
            </div>
            <div class="healthy-info_card">
                <div class="healthy-info_card--img">
                    <img src="image/healthy-info/Group 534812680.png" alt="">
                </div>
                <p>Акции и скидки </p>
            </div>
            <div class="healthy-info_card">
                <div class="healthy-info_card--img">
                    <img src="image/healthy-info/Group 534812681.png" alt="">
                </div>
                <p>Широкий ассортимент</p>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center flex-lg-row flex-column gap-3">
            <div class="mailing-lext d-flex flex-column align-items-lg-start align-items-center">
                <img src="image/whiteLogo.png" alt="">
                <p>Будьте всегда в курсе!</p>
            </div>
            <form action="URL" class="mailing-form">
                <div class="mailing-form_check d-flex gap-3">
                    <input type="checkbox" required>
                    <p>Ознакомлен(а) с <a href="/">правилами</a> предоставления услуг и согласен(на) на обработку своих персональных данных</p>
                </div>
                <div class="d-flex gap-4 flex-nowrap flex-md-row flex-column">
                    <input type="email" class="mailing-email" placeholder="Ваш e-mail" required>
                    <button disabled type="submit">Подписаться <svg width="67" height="67" viewBox="0 0 67 67" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.519 56.481C15.0642 61.0262 20.8552 64.1215 27.1596 65.3755C33.4639 66.6295 39.9986 65.9859 45.9372 63.5261C51.8758 61.0662 56.9516 56.9006 60.5228 51.556C64.0939 46.2114 66 39.9279 66 33.5C66 27.0721 64.0939 20.7886 60.5228 15.444C56.9516 10.0994 51.8758 5.93377 45.9372 3.47392C39.9986 1.01407 33.464 0.370459 27.1596 1.62448C20.8552 2.8785 15.0642 5.97382 10.519 10.519"  stroke-width="2" stroke-linecap="round"/>
                            <path d="M28.3333 17L42 33.5M42 33.5L28.3333 50M42 33.5H0.999999"  stroke-width="2" stroke-linecap="round"/>
                        </svg></button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
