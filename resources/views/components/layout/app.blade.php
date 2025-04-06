<!doctype html>
<html lang="en">
<x-layout.head />
<body x-data="{
        to_money(price) {
            return price > 0
                ? new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(price)
                : 'Free to play';
        },
        format_date(dateStr) {
            const date = new Date(dateStr);
            return date.toLocaleDateString('vi-VN', {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric'
            });
        },
    }"  class="w-full bg-[#1b2838] font-motiva flex flex-col text-white">
<x-partials.header />
{{ $slot }}
</body>
</html>
