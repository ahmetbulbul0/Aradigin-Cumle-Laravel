@isset($data['createdData'])
    @foreach ($data['createdData'] as $createdData)
        <div class="outCreatedData">
            <div class="inCreatedData">
                <div class="createdData">
                    <div class="titleLine">
                        <span>Yeni {{ $createdData['dataName'] }} Oluşturuldu</span>
                    </div>
                    @foreach ($createdData['columnValues'] as $columnValues)
                        <div class="line">
                            <label>{{ $columnValues['column'] }}</label>
                            <span>{{ $columnValues['value'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
@endisset
