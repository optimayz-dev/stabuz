<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use App\Models\Admin\Faq;
use App\Models\Admin\MainBanner;
use App\Models\Admin\News;
use App\Models\Admin\PickUpPoint;
use App\Models\Admin\Promotion;
use App\Models\Admin\PromotionBanner;
use App\Models\Admin\Tag;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\VideoReview;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class HomeController extends Controller
{
    public function homepage()
    {
        $brands = Brand::query()->with('translations')
            ->limit(10)->get();

        $catalogs = Category::whereNull('lvl')
            ->with('translations')
            ->get();

        $new_products = Product::query()->with(['translations', 'brand', 'brand.translations', 'images' ])->orderBy('created_at', 'DESC')
            ->where('new', 1)->limit(10)->get();

        $popular_products = Product::query()->with(['translations', 'brand', 'brand.translations', 'images' ])->orderBy('created_at', 'DESC')
            ->where('popular', 1)->limit(10)->get();

        $actual_products = Product::query()->with(['translations', 'brand', 'brand.translations', 'images' ])->orderBy('created_at', 'DESC')
            ->where('actual', 1)->limit(10)->get();

        $recommend_products = Product::query()->with(['translations', 'brand', 'brand.translations', 'images'])->orderBy('created_at', 'DESC')
            ->where('recommend', 1)->limit(10)->get();

        $credit_products = Product::query()->with(['translations', 'brand', 'brand.translations', 'images'])->orderBy('created_at', 'DESC')
            ->where('credit', 1)->limit(10)->get();

        $discount_products = Product::query()->with(['translations', 'brand', 'brand.translations', 'images'])->orderBy('created_at', 'DESC')
            ->whereNotNull('old_price')->limit(10)->get();


        $tags = Tag::with('translations', 'products.brand.translations', 'products.prices.currency', 'products.translations')
            ->orderBy('created_at', 'desc')
            ->limit(10)->get();

        $main_banners = MainBanner::query()->get();

        $promotion_banners = PromotionBanner::query()->with('translations')
            ->limit(3)->get();

        $news = News::query()->with('translations')
            ->limit(2)->get();

        $video_reviews = VideoReview::query()->with('translations')
            ->limit(2)->get();

        $promotions = Promotion::query()->with('translations')
            ->limit(2)->get();

        $pick_up_points = PickUpPoint::query()->with('translations')->get();

        $faqs = Faq::query()->with('translations')->get();

        return view('front.home', [
            "brands" => $brands,
            "catalogs" => $catalogs,
            'tags' => $tags,
            'main_banners' => $main_banners,
            'promotion_banners' => $promotion_banners,
            'news' => $news,
            'video_reviews' => $video_reviews,
            'promotions' => $promotions,
            'pick_up_points' => $pick_up_points,
            'faqs' => $faqs,
            'new_products' => $new_products,
            'popular_products' => $popular_products,
            'actual_products' => $actual_products,
            'recommend_products' => $recommend_products,
            'credit_products' => $credit_products,
            'discount_products' => $discount_products,

        ]);
    }

    public function changeLocale($locale)
    {

        App::setLocale($locale);
        Session::put('locale', $locale);
        LaravelLocalization::setLocale($locale);
        $url = LaravelLocalization::getLocalizedURL(App::getLocale(), URL::previous());

        return Redirect::to($url);

    }

}
