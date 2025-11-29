<?php

namespace App\Http\Controllers;

use Cache;
use App\Aboutus;
use App\Ad;
use App\Adsetting;
use App\Category;
use App\City;
use App\Comment;
use App\Contactus;
use App\Cookiepolicy;
use App\Epaper;
use App\Footersetting;
use App\Headersetting;
use App\Homepagewidget;
use App\Post;
use App\Postcategory;
use App\Postsubcategory;
use App\Privacypolicy;
use App\Questionoftheday;
use App\State;
use App\Subcategory;
use App\Subscriber;
use App\Tag;
use App\Teamcategory;
use App\Termsofuse;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;

class FrontController extends Controller
{
    public function index()
    {
        // 1️⃣ Recent posts
        $recentNews = Post::with('category', 'user')
            ->where('status', 'published')
            ->whereNotNull('image')
            ->latest()
            ->take(4)
            ->get();

        // 4️⃣ Get 4 subcategories of 'rajya'
        $rajyaCategory = Category::where('slug', 'rajya')
            ->first();

        $subcategories = $rajyaCategory->subcategories()
            ->wherehas('posts') // only subcategories having posts
            ->take(4) // limit to 4 subcategories
            ->get();

        // For each subcategory, fetch latest 5 posts with images
        foreach ($subcategories as $subcategory) {
            $subcategory->posts = $subcategory->posts()
                ->whereNotNull('image')
                ->latest()
                ->take(5)
                ->get();
        }

        // Optionally, attach subcategories back to main category for easier access
        $rajyaCategory->subcategories = $subcategories;



        // 3️⃣ Another random category for "other section" (posts only)
        $videshCategory = Category::with([
            'posts' => function ($q) {
                $q->whereNotNull('image')->latest()->take(6);
            }
        ])
            ->where('slug', 'videsh')
            ->whereHas('posts')
            ->first();

        // 4️⃣ Video posts
        $videoPosts = Cache::remember('video_posts', 300, function () {
            return Post::where('status', 'published')
                ->where('video', '!=', "")
                ->latest('views')
                ->take(3)
                ->get();
        });

        // 5 Another random category for "other section" (posts only)
        $khelCategory = Category::with([
            'posts' => function ($q) {
                $q->whereNotNull('image')->latest()->take(4);
            }
        ])
            ->where('slug', 'khel')
            ->whereHas('posts')
            ->first();

        // 6 Another random category for "other section" (posts only)
        $rajneetiCategory = Category::with([
            'posts' => function ($q) {
                $q->whereNotNull('image')->latest()->take(4);
            }
        ])
            ->where('slug', 'rajneeti')
            ->whereHas('posts')
            ->first();

        // 7 Another random category for "other section" (posts only)
        $crimeCategory = Category::with([
            'posts' => function ($q) {
                $q->whereNotNull('image')->latest()->take(4);
            }
        ])
            ->where('slug', 'crime')
            ->whereHas('posts')
            ->first();

        $otherCategorySlugs = ['manoranjan', 'sahataya', 'desh', 'accident'];

        $otherCategories = Category::whereIn('slug', $otherCategorySlugs)
            ->whereHas('posts')
            ->get();

        foreach ($otherCategories as $category) {
            $category->posts = $category->posts()->whereNotNull('image')->latest()->take(7)->get();
        }

        $moreCategorySlugs = ['health', 'technology', 'taza-khabar', 'tapa-naya', 'breaking-news'];
        $moreCategories = Category::whereIn('slug', $moreCategorySlugs)
            ->whereHas('posts')
            ->get();

        foreach ($moreCategories as $category) {
            $category->posts = $category->posts()->whereNotNull('image')->latest()->take(4)->get();
        }

        $categoryBoxes = Post::whereNotNull('image')
            ->where('status', 'published')
            ->inRandomOrder()
            ->take(6)
            ->get();


        $today = now()->toDateString();
        $uppersidebar300x250 = Ad::whereDate('startdate', '<=', $today)->whereDate('enddate', '>=', $today)->where('page', 'homepage')->where('position', 'uppersidebar300x250')->where('status', 'active')->get();
        $middlesidebar300x250 = Ad::whereDate('startdate', '<=', $today)->whereDate('enddate', '>=', $today)->where('page', 'homepage')->where('position', 'middlesidebar300x250')->where('status', 'active')->get();
        $lowersidebar300x250 = Ad::whereDate('startdate', '<=', $today)->whereDate('enddate', '>=', $today)->where('page', 'homepage')->where('position', 'lowersidebar300x250')->where('status', 'active')->get();
        $uppersidebar300x600 = Ad::whereDate('startdate', '<=', $today)->whereDate('enddate', '>=', $today)->where('page', 'homepage')->where('position', 'uppersidebar300x600')->where('status', 'active')->get();
        $middlesidebar300x600 = Ad::whereDate('startdate', '<=', $today)->whereDate('enddate', '>=', $today)->where('page', 'homepage')->where('position', 'middlesidebar300x600')->where('status', 'active')->get();
        $lowersidebar300x600 = Ad::whereDate('startdate', '<=', $today)->whereDate('enddate', '>=', $today)->where('page', 'homepage')->where('position', 'lowersidebar300x600')->where('status', 'active')->get();
        $upperbanner728x90 = Ad::whereDate('startdate', '<=', $today)->whereDate('enddate', '>=', $today)->where('page', 'homepage')->where('position', 'upperbanner728x90')->where('status', 'active')->get();
        $middlebanner728x90 = Ad::whereDate('startdate', '<=', $today)->whereDate('enddate', '>=', $today)->where('page', 'homepage')->where('position', 'middlebanner728x90')->where('status', 'active')->get();
        $lowerbanner728x90 = Ad::whereDate('startdate', '<=', $today)->whereDate('enddate', '>=', $today)->where('page', 'homepage')->where('position', 'lowerbanner728x90')->where('status', 'active')->get();
        $lowestbanner728x90 = Ad::whereDate('startdate', '<=', $today)->whereDate('enddate', '>=', $today)->where('page', 'homepage')->where('position', 'lowestbanner728x90')->where('status', 'active')->get();
        $adsetting = Adsetting::first();

        return view('front.index', compact(
            'recentNews',
            'rajyaCategory',
            'videshCategory',
            'videoPosts',
            'khelCategory',
            'rajneetiCategory',
            'crimeCategory',
            'otherCategories',
            'moreCategories',
            'categoryBoxes'
        ));
    }

    public function newsDetail($slug)
    {
        $post = Post::with([
            'user',
            'category',
            'tags',
            'comments' => function ($q) {
                $q->whereNull('parent_id') // only top-level comments
                    ->where('status', 'active')
                    ->with([
                        'replies' => function ($q2) {
                            $q2->where('status', 'active');
                        }
                    ])
                    ->orderBy('created_at', 'desc'); // optional: newest first
            }
        ])->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        // Sidebar data
        $randomPosts = Post::inRandomOrder()->where('status', 'published')->limit(6)->get();

        $prevPost = Post::where('id', '<', $post->id)
            ->where('status', 'published')
            ->orderBy('id', 'desc')
            ->first();

        $nextPost = Post::where('id', '>', $post->id)
            ->where('status', 'published')
            ->orderBy('id', 'asc')
            ->first();

        $mostViewedPosts = Post::where('status', 'published')
            ->where('id', '!=', $post->id)
            ->orderBy('views', 'desc')
            ->limit(5)
            ->get();

        return view('front.news-detail', compact('post', 'randomPosts', 'prevPost', 'nextPost', 'mostViewedPosts'));
    }


    // Category posts 
    public function categoryPosts($categoryurl, $subcategorySlug = null)
    {
        // Get category along with subcategories
        $category = Category::with('subcategories')->where('slug', $categoryurl)->firstOrFail();

        // Start query for posts in this category
        $posts = Post::whereHas('categories', function ($query) use ($category) {
            $query->where('category_id', $category->id);
        });

        // Filter by subcategory if requested
        if ($subcategorySlug !== null) {
            $sub_category = Subcategory::where('slug', $subcategorySlug)->firstOrFail();
            $posts->whereHas('subcategories', function ($query) use ($sub_category) {
                $query->where('subcategory_id', $sub_category->id);
            });
        }

        // Finalize query
        $posts = $posts->where('status', 'published')->latest()->paginate(10)->withQueryString();

        return view('front.category-news', compact('category', 'posts', 'subcategorySlug'));
    }

    public function divideArrayIntoGroups($array, $groupSize)
    {
        return array_chunk($array, $groupSize);
    }

    public function fetchVideos()
    {
        $key = 0;
        $videodatas = Post::select('id', 'video')->where('status', 'published')->where('video', '!=', "")->orderBy('views', 'desc')->get()->toArray();

        return response()->json(['success' => true, 'videodatas' => $this->divideArrayIntoGroups($videodatas, 4), 'key' => $key]);

    }
    public function postbycategory($categoryurl, $subcategoryurl = null)
    {
        try {
            // Common
            $headersetting = Headersetting::first();
            $footersetting = Footersetting::first();
            $headercategorieswithsubcategory = Category::where('status', 'active')->where('showonheader', 'yes')->where('hassubcategory', 'yes')->with(['subcategories'])->get();
            $headercategorieswithoutsubcategory = Category::where('status', 'active')->where('showonleftside', 'yes')->where('hassubcategory', 'no')->orderBy('sequence', 'asc')->get();
            $leftcategorieswithoutsubcategory = Category::where('status', 'active')->where('showonheader', 'yes')->where('hassubcategory', 'no')->orderBy('sequence', 'asc')->get();
            $tags = Tag::where('status', 'active')->orderBy('sequence', 'asc')->take(7)->get();
            $footercategories = Category::where('status', 'active')->where('showonfooter', 'yes')->get();
            $breaking_news_ids = Postcategory::latest('id')->where('category_id', 14)->limit(10)->pluck('post_id')->toArray();
            $breakingnews = Post::latest('id')->select(['id', 'slug', 'title'])->whereIn('id', $breaking_news_ids)->where('status', 'published')->take(10)->get();
            // Common
            $category = Category::where('slug', $categoryurl)->firstOrFail();
            $subcategory = Null;
            if ($subcategoryurl) {
                $subcategory = Subcategory::where('slug', $subcategoryurl)->firstorFail();
                $post_ids = Postsubcategory::where('subcategory_id', $subcategory->id)->pluck('post_id')->toArray();
                $posts = Post::latest('id')->whereIn('id', $post_ids)->where('status', 'published')->paginate(20);
            } else {
                $post_ids = Postcategory::latest('id')->where('category_id', $category->id)->pluck('post_id')->toArray();
                $posts = Post::latest('id')->whereIn('id', $post_ids)->where('status', 'published')->paginate(20);
            }
            $big_post_ids = Postcategory::latest('id')->where('category_id', $category->id)->limit(5)->pluck('post_id')->toArray();
            $bigposts = Post::select(['id', 'slug', 'image', 'title'])->whereIn('id', $big_post_ids)->where('status', 'published')->with(['categories'])->orderBy('views', 'desc')->take(5)->get();
            $today = now()->toDateString();
            $sidebar300x250 = Ad::whereHas('categories', function (Builder $query) use ($category) {
                $query->where('category_id', $category->id);
            })->whereDate('startdate', '<=', $today)->whereDate('enddate', '>=', $today)->where('page', 'categorypage')->where('position', 'sidebar300x250')->where('status', 'active')->get();

            $sidebar300x600 = Ad::whereHas('categories', function (Builder $query) use ($category) {
                $query->where('category_id', $category->id);
            })->whereDate('startdate', '<=', $today)->whereDate('enddate', '>=', $today)->where('page', 'categorypage')->where('position', 'sidebar300x600')->where('status', 'active')->get();
            $adsetting = Adsetting::first();
            return view('front.category')
                ->with('headersetting', $headersetting)->with('footersetting', $footersetting)
                ->with('headercategorieswithsubcategories', $headercategorieswithsubcategory)
                ->with('headercategorieswithoutsubcategories', $headercategorieswithoutsubcategory)
                ->with('leftcategorieswithoutsubcategories', $leftcategorieswithoutsubcategory)
                ->with('tags', $tags)
                ->with('footercategories', $footercategories)
                ->with('category', $category)
                ->with('subcategory', $subcategory)
                ->with('posts', $posts)
                ->with('bigposts', $bigposts)
                ->with('breakingnews', $breakingnews)
                ->with('sidebar300x250', $sidebar300x250)
                ->with('sidebar300x600', $sidebar300x600)
                ->with('adsetting', $adsetting);
        } catch (\Exception $ex) {

        }
    }


    public function postbysubcategory($subcategoryurl)
    {
        try {
            // Common
            $headersetting = Headersetting::first();
            $footersetting = Footersetting::first();
            $headercategorieswithsubcategory = Category::where('status', 'active')->where('showonheader', 'yes')->where('hassubcategory', 'yes')->with(['subcategories'])->get();
            $headercategorieswithoutsubcategory = Category::where('status', 'active')->where('showonleftside', 'yes')->where('hassubcategory', 'no')->orderBy('sequence', 'asc')->get();
            $leftcategorieswithoutsubcategory = Category::where('status', 'active')->where('showonheader', 'yes')->where('hassubcategory', 'no')->orderBy('sequence', 'asc')->get();
            $tags = Tag::where('status', 'active')->orderBy('sequence', 'asc')->take(7)->get();
            $footercategories = Category::where('status', 'active')->where('showonfooter', 'yes')->get();
            $breaking_news_ids = Postcategory::latest('id')->where('category_id', 14)->limit(10)->pluck('post_id')->toArray();
            $breakingnews = Post::latest('id')->select(['id', 'slug', 'title'])->whereIn('id', $breaking_news_ids)->where('status', 'published')->take(10)->get();
            // Common
            $subcategory = Subcategory::where('slug', $subcategoryurl)->firstOrFail();
            $category = Category::where('id', 5)->firstOrFail();
            $post_ids = Postsubcategory::where('subcategory_id', $subcategory->id)->pluck('post_id')->toArray();
            $posts = Post::latest('id')->whereIn('id', $post_ids)->where('status', 'published')->paginate(20);

            $big_post_ids = Postcategory::latest('id')->where('category_id', $category->id)->limit(5)->pluck('post_id')->toArray();
            $bigposts = Post::select(['id', 'slug', 'image', 'title'])->whereIn('id', $big_post_ids)->where('status', 'published')->with(['categories'])->orderBy('views', 'desc')->take(5)->get();
            $today = now()->toDateString();
            $sidebar300x250 = Ad::whereHas('categories', function (Builder $query) use ($category) {
                $query->where('category_id', $category->id);
            })->whereDate('startdate', '<=', $today)->whereDate('enddate', '>=', $today)->where('page', 'categorypage')->where('position', 'sidebar300x250')->where('status', 'active')->get();

            $sidebar300x600 = Ad::whereHas('categories', function (Builder $query) use ($category) {
                $query->where('category_id', $category->id);
            })->whereDate('startdate', '<=', $today)->whereDate('enddate', '>=', $today)->where('page', 'categorypage')->where('position', 'sidebar300x600')->where('status', 'active')->get();
            $adsetting = Adsetting::first();
            return view('front.subcategory')
                ->with('headersetting', $headersetting)->with('footersetting', $footersetting)
                ->with('headercategorieswithsubcategories', $headercategorieswithsubcategory)
                ->with('headercategorieswithoutsubcategories', $headercategorieswithoutsubcategory)
                ->with('leftcategorieswithoutsubcategories', $leftcategorieswithoutsubcategory)
                ->with('tags', $tags)
                ->with('footercategories', $footercategories)
                ->with('category', $category)
                ->with('subcategory', $subcategory)
                ->with('posts', $posts)
                ->with('bigposts', $bigposts)
                ->with('breakingnews', $breakingnews)
                ->with('sidebar300x250', $sidebar300x250)
                ->with('sidebar300x600', $sidebar300x600)
                ->with('adsetting', $adsetting);
        } catch (\Exception $ex) {

        }
    }

    public function postdetail($categoryurl = '', $posturl)
    {
        try {
            // Common
            $headersetting = Headersetting::first();
            $footersetting = Footersetting::first();
            $headercategorieswithsubcategory = Category::where('status', 'active')->where('showonheader', 'yes')->where('hassubcategory', 'yes')->with(['subcategories'])->get();
            $headercategorieswithoutsubcategory = Category::where('status', 'active')->where('showonleftside', 'yes')->where('hassubcategory', 'no')->orderBy('sequence', 'asc')->get();
            $leftcategorieswithoutsubcategory = Category::where('status', 'active')->where('showonheader', 'yes')->where('hassubcategory', 'no')->orderBy('sequence', 'asc')->get();
            $tags = Tag::where('status', 'active')->orderBy('sequence', 'asc')->take(7)->get();
            $footercategories = Category::where('status', 'active')->where('showonfooter', 'yes')->get();
            $breaking_news_ids = Postcategory::latest('id')->where('category_id', 14)->limit(10)->pluck('post_id')->toArray();
            $breakingnews = Post::latest('id')->select(['id', 'slug', 'title'])->whereIn('id', $breaking_news_ids)->where('status', 'published')->take(10)->get();
            // Common
            $category = Category::where('slug', $categoryurl)->firstOrFail();
            $post = Post::where('slug', $posturl)->with(['tags', 'comments'])->firstOrFail();
            $big_post_ids = Postcategory::where('category_id', $category->id)->pluck('post_id')->toArray();
            $bigposts = Post::select(['slug', 'image', 'title'])->whereIn('id', $big_post_ids)->where('status', 'published')->orderBy('views', 'desc')->take(5)->get();
            $homepagewidget = Homepagewidget::first();
            if ($homepagewidget->youmaylikeposttype == 'all') {
                $you_may_like_post_ids = Postcategory::where('category_id', $homepagewidget->youmaylikecategory)->pluck('post_id')->toArray();
                $youmaylikeposts = Post::whereIn('id', $you_may_like_post_ids)->where('status', 'published')->take(4)->get();
            } elseif ($homepagewidget->youmaylikeposttype == 'trending') {
                $you_may_like_post_ids = Postcategory::where('category_id', $homepagewidget->youmaylikecategory)->pluck('post_id')->toArray();
                $youmaylikeposts = Post::whereIn('id', $you_may_like_post_ids)->where('status', 'published')->orderBy('views', 'desc')->take(4)->get();
            } elseif ($homepagewidget->youmaylikeposttype == 'latest') {
                $you_may_like_post_ids = Postcategory::where('category_id', $homepagewidget->youmaylikecategory)->pluck('post_id')->toArray();
                $youmaylikeposts = Post::latest('id')->whereIn('id', $you_may_like_post_ids)->where('status', 'published')->take(4)->get();
            } elseif ($homepagewidget->youmaylikeposttype == 'oldest') {
                $you_may_like_post_ids = Postcategory::where('category_id', $homepagewidget->youmaylikecategory)->pluck('post_id')->toArray();
                $youmaylikeposts = Post::whereIn('id', $you_may_like_post_ids)->where('status', 'published')->orderBy('id', 'asc')->take(4)->get();
            }
            $views = $post->views + 1;
            Post::where('id', $post->id)->update([
                'views' => $views,
            ]);
            $today = now()->toDateString();
            $uppersidebar300x250 = Ad::whereDate('startdate', '<=', $today)->whereDate('enddate', '>=', $today)->where('page', 'postpage')->where('position', 'uppersidebar300x250')->where('status', 'active')->get();
            $lowersidebar300x250 = Ad::whereDate('startdate', '<=', $today)->whereDate('enddate', '>=', $today)->where('page', 'postpage')->where('position', 'lowersidebar300x250')->where('status', 'active')->get();
            $sidebar300x600 = Ad::whereDate('startdate', '<=', $today)->whereDate('enddate', '>=', $today)->where('page', 'postpage')->where('position', 'sidebar300x600')->where('status', 'active')->get();
            $adsetting = Adsetting::first();
            return view('front.news-details')
                ->with('headersetting', $headersetting)
                ->with('footersetting', $footersetting)
                ->with('headercategorieswithsubcategories', $headercategorieswithsubcategory)
                ->with('headercategorieswithoutsubcategories', $headercategorieswithoutsubcategory)
                ->with('leftcategorieswithoutsubcategories', $leftcategorieswithoutsubcategory)
                ->with('tags', $tags)
                ->with('footercategories', $footercategories)
                ->with('category', $category)
                ->with('post', $post)
                ->with('bigposts', $bigposts)
                ->with('youmaylikeposts', $youmaylikeposts)
                ->with('views', $views)
                ->with('breakingnews', $breakingnews)
                ->with('uppersidebar300x250', $uppersidebar300x250)
                ->with('lowersidebar300x250', $lowersidebar300x250)
                ->with('sidebar300x600', $sidebar300x600)
                ->with('adsetting', $adsetting);
        } catch (\Exception $ex) {

        }
    }
    public function postdetails($posturl)
    {
        try {
            // Common
            $headersetting = Headersetting::first();
            $footersetting = Footersetting::first();
            $headercategorieswithsubcategory = Category::where('status', 'active')->where('showonheader', 'yes')->where('hassubcategory', 'yes')->with(['subcategories'])->get();
            $headercategorieswithoutsubcategory = Category::where('status', 'active')->where('showonleftside', 'yes')->where('hassubcategory', 'no')->orderBy('sequence', 'asc')->get();
            $leftcategorieswithoutsubcategory = Category::where('status', 'active')->where('showonheader', 'yes')->where('hassubcategory', 'no')->orderBy('sequence', 'asc')->get();
            $tags = Tag::where('status', 'active')->orderBy('sequence', 'asc')->take(7)->get();
            $footercategories = Category::where('status', 'active')->where('showonfooter', 'yes')->get();
            $breaking_news_ids = Postcategory::latest('id')->where('category_id', 14)->limit(10)->pluck('post_id')->toArray();
            $breakingnews = Post::latest('id')->select(['id', 'slug', 'title'])->whereIn('id', $breaking_news_ids)->where('status', 'published')->take(10)->get();
            // Common
            $category = Category::first();
            $post = Post::where('slug', $posturl)->with(['tags', 'comments'])->firstOrFail();
            $big_post_ids = Postcategory::pluck('post_id')->toArray();
            $bigposts = Post::select(['slug', 'image', 'title'])->whereIn('id', $big_post_ids)->where('status', 'published')->orderBy('views', 'desc')->take(5)->get();
            $homepagewidget = Homepagewidget::first();
            if ($homepagewidget->youmaylikeposttype == 'all') {
                $you_may_like_post_ids = Postcategory::where('category_id', $homepagewidget->youmaylikecategory)->pluck('post_id')->toArray();
                $youmaylikeposts = Post::whereIn('id', $you_may_like_post_ids)->where('status', 'published')->take(4)->get();
            } elseif ($homepagewidget->youmaylikeposttype == 'trending') {
                $you_may_like_post_ids = Postcategory::where('category_id', $homepagewidget->youmaylikecategory)->pluck('post_id')->toArray();
                $youmaylikeposts = Post::whereIn('id', $you_may_like_post_ids)->where('status', 'published')->orderBy('views', 'desc')->take(4)->get();
            } elseif ($homepagewidget->youmaylikeposttype == 'latest') {
                $you_may_like_post_ids = Postcategory::where('category_id', $homepagewidget->youmaylikecategory)->pluck('post_id')->toArray();
                $youmaylikeposts = Post::latest('id')->whereIn('id', $you_may_like_post_ids)->where('status', 'published')->take(4)->get();
            } elseif ($homepagewidget->youmaylikeposttype == 'oldest') {
                $you_may_like_post_ids = Postcategory::where('category_id', $homepagewidget->youmaylikecategory)->pluck('post_id')->toArray();
                $youmaylikeposts = Post::whereIn('id', $you_may_like_post_ids)->where('status', 'published')->orderBy('id', 'asc')->take(4)->get();
            }
            $views = $post->views + 1;
            Post::where('id', $post->id)->update([
                'views' => $views,
            ]);
            $today = now()->toDateString();
            $uppersidebar300x250 = Ad::whereDate('startdate', '<=', $today)->whereDate('enddate', '>=', $today)->where('page', 'postpage')->where('position', 'uppersidebar300x250')->where('status', 'active')->get();
            $lowersidebar300x250 = Ad::whereDate('startdate', '<=', $today)->whereDate('enddate', '>=', $today)->where('page', 'postpage')->where('position', 'lowersidebar300x250')->where('status', 'active')->get();
            $sidebar300x600 = Ad::whereDate('startdate', '<=', $today)->whereDate('enddate', '>=', $today)->where('page', 'postpage')->where('position', 'sidebar300x600')->where('status', 'active')->get();
            $adsetting = Adsetting::first();
            return view('front.news-details')
                ->with('headersetting', $headersetting)
                ->with('footersetting', $footersetting)
                ->with('headercategorieswithsubcategories', $headercategorieswithsubcategory)
                ->with('headercategorieswithoutsubcategories', $headercategorieswithoutsubcategory)
                ->with('leftcategorieswithoutsubcategories', $leftcategorieswithoutsubcategory)
                ->with('tags', $tags)
                ->with('footercategories', $footercategories)
                ->with('category', $category)
                ->with('post', $post)
                ->with('bigposts', $bigposts)
                ->with('youmaylikeposts', $youmaylikeposts)
                ->with('views', $views)
                ->with('breakingnews', $breakingnews)
                ->with('uppersidebar300x250', $uppersidebar300x250)
                ->with('lowersidebar300x250', $lowersidebar300x250)
                ->with('sidebar300x600', $sidebar300x600)
                ->with('adsetting', $adsetting);
        } catch (\Exception $ex) {

        }
    }
    public function becomeareporter()
    {
        // Common
        $headersetting = Headersetting::first();
        $footersetting = Footersetting::first();
        $headercategorieswithsubcategory = Category::where('status', 'active')->where('showonheader', 'yes')->where('hassubcategory', 'yes')->with(['subcategories'])->get();
        $headercategorieswithoutsubcategory = Category::where('status', 'active')->where('showonleftside', 'yes')->where('hassubcategory', 'no')->orderBy('sequence', 'asc')->get();
        $leftcategorieswithoutsubcategory = Category::where('status', 'active')->where('showonheader', 'yes')->where('hassubcategory', 'no')->orderBy('sequence', 'asc')->get();
        $tags = Tag::where('status', 'active')->orderBy('sequence', 'asc')->take(7)->get();
        $footercategories = Category::where('status', 'active')->where('showonfooter', 'yes')->get();
        $breaking_news_ids = Postcategory::latest('id')->where('category_id', 14)->limit(10)->pluck('post_id')->toArray();
        $breakingnews = Post::latest('id')->select(['id', 'slug', 'title'])->whereIn('id', $breaking_news_ids)->where('status', 'published')->take(10)->get();
        // Common
        $states = State::where('country_id', '101')->get();
        return view('front.become-a-reporter')
            ->with('headersetting', $headersetting)->with('footersetting', $footersetting)
            ->with('headercategorieswithsubcategories', $headercategorieswithsubcategory)
            ->with('headercategorieswithoutsubcategories', $headercategorieswithoutsubcategory)
            ->with('leftcategorieswithoutsubcategories', $leftcategorieswithoutsubcategory)
            ->with('tags', $tags)->with('footercategories', $footercategories)
            ->with('states', $states)->with('breakingnews', $breakingnews);
    }

    public function fetchcitybystateid(Request $request)
    {
        if ($request->filled('state_id')) {
            try {
                $city = City::where('state_id', $request->state_id)->orderBy('name', 'ASC')->get();
                return response()->json([
                    'msgCode' => '200',
                    'html' => view('front.ajax.cityoptions')->with('cities', $city)->render(),
                ]);
            } catch (\Exception $ex) {
                return response()->json([
                    'msgCode' => '400',
                    'msgText' => $ex->getMessage(),
                ]);
            }
        } else {
            return response()->json([
                'msgCode' => '400',
                'msgText' => 'No State Selected',
            ]);
        }
    }

    public function storebecomeareporter(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'contact' => 'required|digits:10|unique:users',
            'gender' => 'required',
            'address' => 'required',
            'state' => 'required|integer',
            'city' => 'required|integer',
            'image' => 'required|image|max:1024',
            'cv' => 'nullable|mimes:pdf,xls,doc,docx',
        ]);
        try {
            $data = array(
                'name' => $request->name,
                'email' => $request->email,
                'contact' => $request->contact,
                'password' => Hash::make($request->contact),
                'gender' => $request->gender,
                'address' => $request->address,
                'state_id' => $request->state,
                'city_id' => $request->city,
                'image' => $request->image->store('users'),
                'added_by' => 'frontend',
                'role' => 'reporter',
            );
            if ($request->hasFile('cv')) {
                $data['cv'] = $request->cv->store('users');
            }
            User::create($data);
            return redirect(route('become-a-reporter'))->with('success', 'Registration Submitted');
        } catch (\Exception $ex) {
            return redirect(route('become-a-reporter'))->with('error', 'Error Encountered ' . $ex->getMessage());
        }
    }

    public function addcomment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'contact' => 'required|digits:10',
            'comment' => 'required',
            'g-recaptcha-response' => 'required'
        ]);
        if ($validator->passes()) {
            // Validate captcha with Google
            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => env('RECAPTCHA_SECRET_KEY'),
                'response' => $request['g-recaptcha-response']
            ]);

            if (!$response->json()['success']) {
                return response()->json(['error' => 'Captcha verification failed'], 422);
            }

            Comment::create([
                'post_id' => $request->post_id,
                'name' => $request->name,
                'email' => $request->email,
                'contact' => $request->contact,
                'content' => $request->comment,
                'type' => 'comment'
            ]);
            return response()->json([
                'msgCode' => '200',
                'msgText' => 'Comment Added',
            ]);

        } else {
            return response()->json([
                'msgCode' => '401',
                'errors' => $validator->errors(),
            ]);
        }
    }

    public function addcommentreply(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'contact' => 'required|digits:10',
            'comment' => 'required',
            'g-recaptcha-response' => 'required'

        ]);
        if ($validator->passes()) {
            // Validate captcha with Google
            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => env('RECAPTCHA_SECRET_KEY'),
                'response' => $request['g-recaptcha-response']
            ]);

            if (!$response->json()['success']) {
                return response()->json(['error' => 'Captcha verification failed'], 422);
            }

            try {
                Comment::findOrFail($id);
                Comment::create([
                    'post_id' => $request->post_id,
                    'name' => $request->name,
                    'email' => $request->email,
                    'contact' => $request->contact,
                    'content' => $request->comment,
                    'parent_id' => $id,
                    'type' => 'reply'
                ]);
                return response()->json([
                    'msgCode' => '200',
                    'msgText' => 'Comment Added',
                ]);
            } catch (\Exception $ex) {
                return response()->json([
                    'msgCode' => '400',
                    'msgText' => $ex->getMessage(),
                ]);
            }
        } else {
            return response()->json([
                'msgCode' => '401',
                'errors' => $validator->errors(),
            ]);
        }
    }
    public function searchsdata(Request $request)
    {
        $query = $request->input('query');

        // Perform the search using your model (e.g., Post)
        $results = Tag::where('name', 'like', "%$query%")->get(['name', 'slug']);

        return response()->json($results);
    }


    public function aboutus()
    {
        $aboutus = Aboutus::first();
        $reporters = User::where('role', 'reporter')->where('status', 'approved')->get();
        return view('front.about-us')
            ->with('aboutus', $aboutus)->with('reporters', $reporters);
    }

    public function contactus()
    {

        $aboutus = Aboutus::first();
        // dd($aboutus->toArray());
        return view('front.contact')
            ->with('aboutus', $aboutus);
    }

    public function cookiepolicy()
    {

        $cookiepolicy = Cookiepolicy::first();
        return view('front.cookie-policy')->with('cookiepolicy', $cookiepolicy);
    }

    public function privacypolicy()
    {
        $privacypolicy = Privacypolicy::first();
        return view('front.privacy-policy')
            ->with('privacypolicy', $privacypolicy);
    }

    public function termsofuse()
    {

        $termsofuse = Termsofuse::first();
        return view('front.terms-of-use')
            ->with('termsofuse', $termsofuse);
    }

    public function addcontactus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|min:3',
            'email' => 'required|email',
            'contact' => 'required|digits_between:10,15',
            'message' => 'required|string|min:10',
            'g-recaptcha-response' => 'required',
        ]);

        if ($validator->passes()) {
            // Validate captcha with Google
            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => env('RECAPTCHA_SECRET_KEY'),
                'response' => $request['g-recaptcha-response']
            ]);

            if (!$response->json()['success']) {
                return response()->json(['error' => 'Captcha verification failed'], 422);
            }

            try {
                $data = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'contact' => $request->contact,
                    'content' => $request->message,
                ];

                Contactus::create($data);

                // Mail::send('email.contact-enquiry', $data, function ($message) {
                //     $message->to('prakashprabhaw@gmail.com', 'Prakash Prabhaw')
                //         ->from('support@prakashprabhaw.com', 'Support Prakash Prabhaw')
                //         ->subject('New Contact Enquiry');
                // });

                return response()->json([
                    'msgCode' => '200',
                    'msgText' => 'Query Added Successfully!',
                ]);
            } catch (\Exception $ex) {
                return response()->json([
                    'msgCode' => '400',
                    'msgText' => $ex->getMessage(),
                ]);
            }
        } else {
            return response()->json([
                'msgCode' => '401',
                'errors' => $validator->errors(),
            ]);
        }
    }

    public function ourteam()
    {
        $categories = Teamcategory::with(['teams'])->where('status', 'active')->get();
        return view('front.our-team')
            ->with('categories', $categories);
    }

    public function addsubscriber(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers',
        ]);
        try {
            Subscriber::create([
                'email' => $request->email,
            ]);
            return redirect()->back()->with('success', 'Thank you for subscribing!');
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    public function submitpoll(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'option' => 'required',
        ]);
        if ($validator->passes()) {
            try {
                $questioncurrent = Questionoftheday::where('status', 'active')->firstOrFail();
                $question = Questionoftheday::where('id', $questioncurrent->id)->value($request->option . 'vote');
                Questionoftheday::where('id', $questioncurrent->id)->update([
                    $request->option . 'vote' => $question + 1,
                ]);
                session([
                    'questionid' => $questioncurrent->id,
                ]);
                return response()->json([
                    'msgCode' => '200',
                    'msgText' => 'Vote Added',
                ]);
            } catch (\Exception $ex) {
                return response()->json([
                    'msgCode' => '400',
                    'msgText' => $ex->getMessage(),
                ]);
            }
        } else {
            return response()->json([
                'msgCode' => '401',
                'errors' => $validator->errors(),
            ]);
        }
    }

    public function search(Request $request)
    {
        $posts = Post::query(); // Start with a base query

        $query = $request->input('q'); // keyword
        $tagSlug = $request->input('tag'); // tag slug

        if ($query) {
            // Search by keyword in title or content
            $posts->where('status', 'published')
                ->where(function ($q) use ($query) {
                    $q->where('title', 'LIKE', "%{$query}%")
                        ->orWhere('content', 'LIKE', "%{$query}%");
                });
        }

        if ($tagSlug) {
            // Search by tag
            $tag = Tag::where('slug', $tagSlug)->firstOrFail();
            $posts->whereHas('tags', function (Builder $q) use ($tag) {
                $q->where('tag_id', $tag->id);
            });
            $posts->where('status', 'published');
        }

        $posts = $posts->orderBy('created_at', 'desc')->paginate(10);

        return view('front.search', compact('posts', 'query', 'tagSlug'));
    }


    public function epaper()
    {
        $epapers = Epaper::where('status', 'active')
            ->orderBy('date', 'DESC')
            ->paginate(12); // Show 12 per page (change as needed)

        return view('front.e-paper', compact('epapers'));
    }


    public function filterepaper(Request $request)
    {
        try {
            if ($request->filled('date')) {
                $epaper = Epaper::whereDate('date', $request->date)->first();
            } else {
                $epaper = Epaper::whereDate('date', now())->first();
            }
            return response()->json([
                "msgCode" => "200",
                "html" => view('front.ajax.e-paper')->with('epaper', $epaper)->render(),
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'msgCode' => '400',
                'msgText' => $ex->getMessage(),
            ]);
        }
    }
    public function fetchepaperbydate($date)
    {
        try {
            if ($date) {
                $epaper = Epaper::whereDate('date', $date)->get();
            } else {
                $epaper = Epaper::whereDate('date', now())->get();
            }
            return response()->json([
                "msgCode" => "200",
                "success" => true,
                "html" => view('front.ajax.e-paper-by-date')->with('datas', $epaper)->render(),
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'msgCode' => '400',
                'msgText' => $ex->getMessage(),
            ]);
        }
    }


    public function customfunction()
    {
        try {
            $posts = Post::where('id', 8853)->get();
            foreach ($posts as $post) {
                dump(Storage::size($post->image));
                // if(isset($post->image) && Storage::exists($post->image)){
                //     // dump(Storage::size($post->image));
                //     $imagehash=$post->image;
                //     $path = storage_path('app/public/'.$imagehash);
                //     Image::make($path)->resize(600,600,function($constraint){
                //         $constraint->aspectRatio();
                //         $constraint->upsize();
                //     })->save($path);   
                // }
            }
            // $posts=Post::whereNotNull('image')->skip(600)->take(500)->get();
            // $i=1;
            // dump('started');
            // foreach($posts as $post){
            //     if(isset($post->image) && Storage::exists($post->image)){
            //         $imagehash=$post->image;
            //         $path = storage_path('app/public/'.$imagehash);
            //         Image::make($path)->resize(600,600,function($constraint){
            //             $constraint->aspectRatio();
            //             $constraint->upsize();
            //         })->save($path);   
            //         dump('done-'.$i);
            //     } else {
            //         dump('Not done-'.$i);
            //     }
            //     $i++;
            // }
            dump('done');
        } catch (\Exception $ex) {
            dd($ex->getMessage());
        }
    }
}