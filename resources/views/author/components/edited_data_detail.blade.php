<div class="outCreatedData">
    <div class="inCreatedData">
        <div class="createdData">
            <div class="titleLine">
                <span>{{ $data['editedDataName'] ?? '????' }} Güncellendi</span>
            </div>
            @isset($data['editedData'])
                @foreach ($data['editedData'] as $editedData)
                    <div class="line">
                        <label>{{ $editedData['column'] }}</label>
                        <span>{{ $editedData['value'] }}</span>
                    </div>
                @endforeach
            @endisset
        </div>
    </div>
</div>
