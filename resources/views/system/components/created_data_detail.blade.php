<div class="outCreatedData">
    <div class="inCreatedData">
        <div class="createdData">
            <div class="titleLine">
                <span>Yeni {{ $data['createdDataName'] ?? '????' }} Oluşturuldu</span>
            </div>
            @isset($data['createdData'])
                @foreach ($data['createdData'] as $createdData)
                    <div class="line">
                        <label>{{ $createdData['column'] }}</label>
                        <span>{{ $createdData['value'] }}</span>
                    </div>
                @endforeach
            @endisset
        </div>
    </div>
</div>
