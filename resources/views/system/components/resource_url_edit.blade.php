<div class="outNewsCreate">
    <div class="inNewsCreate">
        <div class="outNewsCreateTitle">
            <span class="inNewsCreateTitle">
                Kaynak Site Düzenle
            </span>
        </div>
        <div class="outNewsCreateForm">
            <form class="inNewsCreateForm" method="POST">
                <div class="line">
                    <span class="inputLabel">Kaynak Platform:</span>
                    <div class="outSelectBox">
                        <select name="resourcePlatform">
                            <option selected disabled>Kaynak Platform</option>
                            @foreach ($data['resourcePlatforms'] as $resource)
                                <option value="{{ $resource['no'] }}"
                                    @if ($resource['no'] == $data['data']['resource_platform']['no']) selected @endif>
                                    {{ $resource['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @isset($data['errors']['resourcePlatform'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['resourcePlatform'] }}
                            </span>
                        </div>
                    </div>
                @endisset
                <div class="line">
                    <span class="inputLabel">Url:</span>
                    <div class="outInputText">
                        <input type="text" name="url" value="{{ $data['data']['url'] }}" placeholder="Url...">
                    </div>
                </div>
                @isset($data['errors']['url'])
                    <div class="line">
                        <div class="outErrorBox">
                            <span>
                                {{ $data['errors']['url'] }}
                            </span>
                        </div>
                    </div>
                @endisset
                @csrf
                <div class="line">
                    <div class="outSubmitBox">
                        <button>
                            İşlemi Tamamla
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
