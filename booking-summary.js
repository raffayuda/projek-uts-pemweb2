// Fungsi untuk memperbarui booking summary
function updateBookingSummary() {
    // Mengambil nilai lokasi
    const pickupLocation = document.getElementById('pickup_location');
    const returnLocation = document.getElementById('return_location');
    
    // Mengambil nilai tanggal dan waktu
    const pickupDate = document.getElementById('pickup_date');
    const pickupTime = document.getElementById('pickup_time');
    const returnDate = document.getElementById('return_date');
    const returnTime = document.getElementById('return_time');
    
    // Mengambil nilai kendaraan yang dipilih
    const selectedVehicle = document.querySelector('.vehicle-card.selected');
    
    // Memperbarui lokasi di summary
    document.getElementById('summary-pickup-location').textContent = 
        pickupLocation.options[pickupLocation.selectedIndex]?.text || '-';
    document.getElementById('summary-return-location').textContent = 
        returnLocation.options[returnLocation.selectedIndex]?.text || '-';
    
    // Memperbarui tanggal dan waktu di summary
    const pickupDateTime = pickupDate.value && pickupTime.value ? 
        `${formatDate(pickupDate.value)} ${pickupTime.value}` : '-';
    const returnDateTime = returnDate.value && returnTime.value ? 
        `${formatDate(returnDate.value)} ${returnTime.value}` : '-';
    
    document.getElementById('summary-pickup-datetime').textContent = pickupDateTime;
    document.getElementById('summary-return-datetime').textContent = returnDateTime;
    
    // Memperbarui informasi kendaraan dan harga
    if (selectedVehicle) {
        // Perbaikan selector untuk nama kendaraan
        const vehicleName = selectedVehicle.querySelector('h4.font-semibold').textContent;
        
        // Perbaikan selector untuk jenis kendaraan
        const vehicleType = selectedVehicle.querySelector('.px-2.py-1.text-xs.bg-gradient-to-r').textContent;
        
        // Perbaikan selector untuk harga per hari
        const pricePerDay = selectedVehicle.querySelector('.font-bold').textContent
            .replace('Rp', '').replace('/hari', '').trim();
        
        document.getElementById('summary-vehicle-name').textContent = vehicleName;
        document.getElementById('summary-vehicle-type').textContent = vehicleType;
        
        // Menghitung total hari
        if (pickupDate.value && returnDate.value) {
            const start = new Date(pickupDate.value);
            const end = new Date(returnDate.value);
            const diffTime = Math.abs(end - start);
            const days = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
            
            // Memperbarui ringkasan harga
            const priceNumber = parseInt(pricePerDay.replace(/[^0-9]/g, ''));
            const subtotal = priceNumber * days;
            
            document.getElementById('summary-days').textContent = 
                `${days} hari × ${formatCurrency(priceNumber)}/hari`;
            document.getElementById('summary-subtotal').textContent = formatCurrency(subtotal);
            document.getElementById('summary-total').textContent = formatCurrency(subtotal);
            
            // Memperbarui hidden input untuk vehicle_id
            if(document.getElementById('selected_vehicle_id')) {
                document.getElementById('selected_vehicle_id').value = selectedVehicle.getAttribute('data-vehicle-id');
            }
        }
    }
}

// Fungsi untuk memformat tanggal
function formatDate(dateString) {
    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    return new Date(dateString).toLocaleDateString('id-ID', options);
}

// Fungsi untuk memformat mata uang
function formatCurrency(number) {
    return `Rp ${number.toLocaleString('id-ID')}`;
}

// Event listeners untuk form inputs
document.addEventListener('DOMContentLoaded', function() {
    const formInputs = [
        'pickup_location',
        'return_location',
        'pickup_date',
        'pickup_time',
        'return_date',
        'return_time'
    ];
    
    formInputs.forEach(id => {
        const element = document.getElementById(id);
        if (element) {
            element.addEventListener('change', updateBookingSummary);
        }
    });
    
    // Event listener untuk pemilihan kendaraan
    const vehicleCards = document.querySelectorAll('.vehicle-card');
    vehicleCards.forEach(card => {
        card.addEventListener('click', function() {
            vehicleCards.forEach(c => c.classList.remove('selected'));
            this.classList.add('selected');
            updateBookingSummary();
        });
    });
    
    // Inisialisasi summary
    updateBookingSummary();
});