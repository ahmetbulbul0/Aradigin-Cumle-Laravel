<div class="outScheme">
    <div class="inScheme">
        @isset($data['categories']['mainCategories'])
            @foreach ($data['categories']['mainCategories'] as $mainCategory)
                <div class="categoryList">
                    <div class="mainLine">
                        <span>{{ Str::title($mainCategory['name']) }}</span>
                    </div>
                    @isset($data['categories']['subCategories'])
                        @foreach ($data['categories']['subCategories'] as $subCategory)
                            @if ($subCategory['main_category']['no'] == $mainCategory['no'])
                                <div class="subLine">
                                    <span>{{ Str::title($subCategory['name']) }}</span>
                                </div>
                                @foreach ($data['categories']['subCategories'] as $sub1Category)
                                    @if ($sub1Category['main_category']['no'] == $subCategory['no'])
                                        <div class="sub1Line">
                                            <span>{{ Str::title($sub1Category['name']) }}</span>
                                        </div>
                                        @foreach ($data['categories']['subCategories'] as $sub2Category)
                                            @if ($sub2Category['main_category']['no'] == $sub1Category['no'])
                                                <div class="sub2Line">
                                                    <span>{{ Str::title($sub2Category['name']) }}</span>
                                                </div>
                                                @foreach ($data['categories']['subCategories'] as $sub3Category)
                                                    @if ($sub3Category['main_category']['no'] == $sub2Category['no'])
                                                        <div class="sub3Line">
                                                            <span>{{ Str::title($sub3Category['name']) }}</span>
                                                        </div>
                                                        @foreach ($data['categories']['subCategories'] as $sub4Category)
                                                            @if ($sub4Category['main_category']['no'] == $sub3Category['no'])
                                                                <div class="sub4Line">
                                                                    <span>{{ Str::title($sub4Category['name']) }}</span>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    @endisset
                </div>
            @endforeach
        @endisset
    </div>
</div>
