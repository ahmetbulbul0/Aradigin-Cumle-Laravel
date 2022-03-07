<div class="outWebSiteSetup">
    <div class="inWebSiteSetup">
        <div class="outTitle">
            <div class="inTitle">
                AradığınCümle WebSite Kurulumu [{{ $data['setupProcess'] }}]
            </div>
        </div>
        <div class="outContent">
            <div class="inContent">
                <div class="body">
                    @switch($data["stage"])
                        @case('stage1')
                            @include(
                                'common.components.database_and_tables_check'
                            )
                        @break

                        @case('stage2')
                            @include(
                                'common.components.user_and_category_types_create'
                            )
                        @break

                        @case('stage3')
                            @include('common.components.system_user_create')
                        @break

                        @case('stage4')
                            @include(
                                'common.components.main_categories_create'
                            )
                        @break

                        @case('finish')
                            @include('common.components.website_setup_finish')
                        @break
                    @endswitch
                </div>
            </div>
        </div>
        <div class="outAction">
            <div class="inAction">
                @isset($data['previousPage'])
                    <a href="{{ route('kurulum', [$data['previousPage']]) }}">Geri</a>
                @endisset
                @isset($data['nextStage'])
                    <a href="{{ route('kurulum', [$data['nextStage']]) }}">İleri</a>
                @endisset
            </div>
        </div>
    </div>
</div>
