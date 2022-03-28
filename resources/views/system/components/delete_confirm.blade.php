<div class="outDeleteConfirm">
    <div class="inDeleteConfirm">
        <div class="header">
            <span>
                @if (!isset($data['action_name'])) Silme @endif
                @isset($data['action_name']) {{ Str::title($data['action_name']) }} @endisset
                İşlemini Onayla
            </span>

        </div>
        <div class="body">
            <div class="outItemDetail">
                <div class="inItemDetail">
                    <div class="itemDetail">
                        @foreach ($data['itemData'] as $item)
                            <div class="line">
                                <label>{{ $item['label'] }}:</label>
                                <span>{{ $item['span'] }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="outBasictext">
                <div class="inBasicText">
                    yukarıda bilgileri verilen {{ $data['basic_text'] }} {{ $data['action_name'] ?? 'silme' }}
                    işlemini onaylıyormusunuz?
                </div>
            </div>
        </div>
        <form class="footer" method="POST">
            @csrf
            <button name="action" value="approve">Onayla</button>
            <button name="action" value="reject">Vazgeçtim, İptal Et</button>
        </form>
    </div>
</div>
