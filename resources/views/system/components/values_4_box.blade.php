<div class="outValues4Box">
    <div class="inValues4Box">
        <div class="valuesBar">
            <div class="outValueBox">
                <div class="header">
                    <span>{{ $data["values4Box"]["last24HourVisitorNumber"] }}</span>
                </div>
                <div class="body">
                    <span>Son 24 Saat'in Ziyaretçi Sayısı</span>
                </div>
                <div class="footer">
                    <a href="#">
                        Detaylı Bilgi
                        <i class="fas fa-link"></i>
                    </a>
                </div>
            </div>
            <div class="outValueBox">
                <div class="header">
                    <span>{{ $data["values4Box"]["last24HourListingNews"] }}</span>
                </div>
                <div class="body">
                    <span>Son 24 Saat'de Listelenen Haber Sayısı</span>
                </div>
                <div class="footer">
                    <a href="#">
                        Detaylı Bilgi
                        <i class="fas fa-link"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="valuesBar">
            <div class="outValueBox">
                <div class="header">
                    <span>{{ $data["values4Box"]["last24HourReadingNews"] }}</span>
                </div>
                <div class="body">
                    <span>Son 24 Saat'de Okunan Haber Sayısı</span>
                </div>
                <div class="footer">
                    <a href="#">
                        Detaylı Bilgi
                        <i class="fas fa-link"></i>
                    </a>
                </div>
            </div>
            <div class="outValueBox">
                <div class="header">
                    <span>{{ $data["values4Box"]["last24HourPublishingNews"] }}</span>
                </div>
                <div class="body">
                    <span>Son 24 Saat'de Yayınlanan Haber Sayısı</span>
                </div>
                <div class="footer">
                    <a href="#">
                        Detaylı Bilgi
                        <i class="fas fa-link"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ URL::asset('src/js/fast_form.js') }}"></script>
