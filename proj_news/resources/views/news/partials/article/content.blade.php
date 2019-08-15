@php
    use App\Helpers\Template as Template;
    use App\Helpers\URL;

    $name 			  = $item['name'];
    if ($showCategory) {
        $linkCategory     = URL::linkCategory($item['category_id'], $item['categoryName']);
    }
    
    $linkArticle      = URL::linkArticle($item['id'], $item['name']);
    $created		  = Template::showDatetimeFrontend($item['created']);
    $content  		  = Template::showContent($item['content'], $lenghtContent);
@endphp
<div class="post_content">
    @if ($showCategory)
        <div class="post_category cat_technology "><a href="{{ $linkCategory }}">{{ $item['categoryName'] }}</a></div>  
    @endif
    <div class="post_title"><a
        href="{{ $linkArticle }}">{{ $name }}</a>
    </div>
    <div class="post_info d-flex flex-row align-items-center justify-content-start">
        <div class="post_author d-flex flex-row align-items-center justify-content-start">
            <div><div class="post_author_image"><img src="{{ asset('news/images/author_1.jpg') }}" alt=""></div></div>
            <div class="post_author_name"><a href="#">Quang Vu</a></div>
        </div>
        <div class="post_date"><a href="#">{{ $created }}</a></div>
    </div>
    @if ($lenghtContent > 0)
        <div class="post_text">
            <p>{!! $content !!}</p>
        </div>  
    @endif
</div>