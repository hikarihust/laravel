@php
    use App\Helpers\Template as Template;

    $name 			  = $item['name'];
    $categoryName	  = $item['categoryName'];
    $linkCategory     = '#';
    $linkArticle	  = '#';
    $created		  = Template::showDatetimeFrontend($item['created']);
    $content  		  = Template::showContent($item['content'], $lenghtContent);
@endphp
<div class="post_content">
    <div class="post_category cat_technology ">
        <a href="{{ $linkCategory }}">{{ $categoryName }}</a>
    </div>
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