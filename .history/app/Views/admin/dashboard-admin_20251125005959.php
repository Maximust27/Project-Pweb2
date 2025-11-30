<?= $this->extend('layout_admin/sidebar') ?>
<?= $this->section('page_title') ?>
Dashboard
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<!-- TOP CARDS -->
<!-- TOP CARDS -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

    <!-- Total Clients -->
    <div class="bg-white shadow rounded-lg p-6">
        <h3 class="text-lg font-semibold text-gray-600 mb-2">Total Clients</h3>

        <div class="flex justify-between items-center px-10">
            <svg width="150" height="150" viewBox="0 0 1121 805" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect width="1120.47" height="804.346" fill="url(#pattern0_161_671)" />
                    <defs>
                        <pattern id="pattern0_161_671" patternContentUnits="objectBoundingBox" width="1" height="1">
                            <use xlink:href="#image0_161_671" transform="matrix(0.00797626 0 0 0.0111111 0.141068 0)" />
                        </pattern>
                        <image id="image0_161_671" width="90" height="90" preserveAspectRatio="none" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAACXBIWXMAAAsTAAALEwEAmpwYAAAFH0lEQVR4nO2cW2gVRxjH/wm9CLa1UBHzFo2KadH3WGNMtCK26IPoi5Q+9KGFFi8vpVDqBREsiqIP4qVVtKX4KgVrq6hVStu3Qtsk3mjVWkoSReMFsW6PzGFW18PMzszO7MyZc74/DITD9+1/f99mzze7O2cBEolEIpFIJBKJRCJZ6Q0A+wAMArjDxwCAvQDm222axDQNwA8AKopxGsDUagbJWHMA3NAocjpYbLe5TXNrmmGR03EdwJTQOx+TThYocjrYVw1Js/FVLMc8RKwWAG8BOATgLwD3+fiTf/Ymj7HVPgeF3hMR71N6FcDPGoA/Aei09Bp0UOiBiHgfqw/ALQPImzynqEYdFHo0It6qOvmGTEFZzvQIC90ZgLeqHy1gzwT86uiPiBcLHQAviKgZLgzEiy8cGLOimWq+A9++iHhxzoEx+xoootMWnuxiJyre2w6M2TaKaBKAYc+X4MF4XXR/Nk0qqm5eOJMi29xUCsY74MD4D9hpKoBTml8XtjeTgvHudmC8C240j88k+vnpeZv/vcfFxUJo3l4Hxj2IR70heY9bmH6H+HQ8FG87gKECpiMAOhCf2kPydhlOtYZ4TqzqCsnLjvQxDdNveWzsag/NOxvATgC/8iM5xP9mn72OxtPsZuDtzUzpRgVdvZt/lk712PRsbsD9jU4dkoezCYAXM3FjATwUxJ0AMDng/kehWbyD6z6e+l0SO8y3RZLcSMqbWn0pyDmYE09rPCQ6oejwawQ5qxQ57D4JyfDyt0cyK1DluboX4r37s7mj6L/RpvvvVhSLNcKXBHkvSBpiduytQ16t7r9JELvZsvv3K4p1ziJ3sA55tbr/UkH8Msvuf1NRrK9zcr9S5N6pQ97HR1ZmWuGzg1pNzokf1jjSiaJYZwG0CvJaNNdPt9YZr7L735CsN2tR7Owpy0Kz8bEg7yONPFWhQ/Aquz/bKZm+t+j+iUax/uOzjFTsFH1gWehQvMruvz8n93OL7p9oFuwqgPEAXgFwWTMnr9CheJUd/C6AGYK813jTKdr9E4OiXeOj4qDQoXi1Hrmfr5nTjuVPfysW3T8xLFzFUaFD8WoDH9a836ALnAQqdCheI+AtAD7zDFwJVGjXvFEAVxrAt+mAEyo0Gtq36YATKjQa2rfpgBMqNBraN5jxP5r5F/htzQ7+t07OvzLYZiz0Ns38jZmcDZo5W6nQTzQGwA6Nn1KszOR8oIhl94u3823XXaFDncK68G9n4lYUhawH3iKn8HoHp7BuodnbBlItclDoYLy6pzA7bVO97+AU1i10dgVnl4NC1wNvLvByjSfCJsC6vtlXNkz36Fsmb65xn8Fzt1aHvhMzcRM9+pbJm2s8MxM3wyPwmEzc8x59y+TNNW7LxLV5Ar4riL3nqdBl8uYaP5eJexbA/x6A/xbEXvNU6DJ5pcZs+VatbnkA/s1gIbpL37J5pcYXBbGXPACfEcSe9eBbNq/UmL09q1a/eAA+Ioj9xoNv2bxSYwZXq6MegA8IYg958C2bt+6AtwlidzTAAZYas/UNJvcMWh35fiqIXe/Bt2xeqbFo+ewnHoA/FMSu9uBbNq/U+F1B7HsegFcIYt/x4Fs2r9R4iSB2qQfgRYLYxR58y+aVGmcXg6fq8QA8S/LW9LJ9y+atvr63diPs0nOCILZNcll6xdQUzedb7fI6Fw2pjgji15GvWs8AWMt/wjDCf0rwck78OP7KyBF+ZNfxbZiq2XxJJBKJRCKRSCQSCUH1CDIGmeN/YX1dAAAAAElFTkSuQmCC" />
                    </defs>
                </svg>
            <div class="text-7xl">
                <p class="text-9xl font-bold text-gray-800">22</p>
            </div>
        </div>
    </div>

    <!-- Total Service -->
    <div class="bg-white shadow rounded-lg p-6">
        <h3 class="text-lg font-semibold text-gray-600 mb-2">Total Service</h3>

        <div class="flex justify-between items-center px-10">
            <svg width="100" height="100" viewBox="0 0 739 661" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M374.911 247.617L317.064 196.675C324.24 180.425 328.047 162.885 328.047 144.443C328.047 64.6125 254.676 0 164.024 0C73.3713 0 0 64.6125 0 144.443C0 224.274 73.3713 288.886 164.024 288.886C184.966 288.886 204.883 285.404 223.336 279.214L281.184 330.156L223.336 381.098C204.883 374.778 184.966 371.425 164.024 371.425C73.3713 371.425 0 436.038 0 515.868C0 595.699 73.3713 660.312 164.024 660.312C254.676 660.312 328.047 595.699 328.047 515.868C328.047 497.426 324.093 479.887 317.064 463.637L731.077 99.0467C741.475 89.8901 741.475 75.1878 731.077 66.0312C689.632 29.5335 622.558 29.5335 581.113 66.0312L374.911 247.617ZM408.009 441.841L581.113 594.28C622.558 630.778 689.632 630.778 731.077 594.28C741.475 585.124 741.475 570.422 731.077 561.265L501.737 359.302L408.009 441.841ZM93.7278 144.443C93.7278 136.314 95.5461 128.264 99.0788 120.753C102.612 113.243 107.789 106.419 114.317 100.67C120.845 94.9219 128.594 90.3621 137.123 87.2511C145.651 84.1402 154.792 82.539 164.024 82.539C173.255 82.539 182.396 84.1402 190.925 87.2511C199.453 90.3621 207.203 94.9219 213.73 100.67C220.258 106.419 225.436 113.243 228.969 120.753C232.501 128.264 234.32 136.314 234.32 144.443C234.32 152.573 232.501 160.622 228.969 168.133C225.436 175.643 220.258 182.468 213.73 188.216C207.203 193.964 199.453 198.524 190.925 201.635C182.396 204.746 173.255 206.347 164.024 206.347C154.792 206.347 145.651 204.746 137.123 201.635C128.594 198.524 120.845 193.964 114.317 188.216C107.789 182.468 102.612 175.643 99.0788 168.133C95.5461 160.622 93.7278 152.573 93.7278 144.443ZM164.024 453.964C173.255 453.964 182.396 455.565 190.925 458.676C199.453 461.787 207.203 466.347 213.73 472.096C220.258 477.844 225.436 484.668 228.969 492.179C232.501 499.689 234.32 507.739 234.32 515.868C234.32 523.998 232.501 532.048 228.969 539.558C225.436 547.069 220.258 553.893 213.73 559.641C207.203 565.39 199.453 569.95 190.925 573.06C182.396 576.171 173.255 577.773 164.024 577.773C154.792 577.773 145.651 576.171 137.123 573.06C128.594 569.95 120.845 565.39 114.317 559.641C107.789 553.893 102.611 547.069 99.0788 539.558C95.5461 532.048 93.7278 523.998 93.7278 515.868C93.7278 507.739 95.5461 499.689 99.0788 492.179C102.611 484.668 107.789 477.844 114.317 472.096C120.845 466.347 128.594 461.787 137.123 458.676C145.651 455.565 154.792 453.964 164.024 453.964Z" fill="black" />
                </svg>
            <div class="text-7xl">
                <p class="text-9xl font-bold text-gray-800">12</p>
            </div>
        </div>
    </div>

</div>


<!-- RECENT BOOKINGS -->
<div class="bg-white shadow rounded-lg p-6">

    <h3 class="text-lg font-semibold mb-4">Recent Bookings</h3>

    <!-- Search -->
    <div class="mb-4">
        <input type="text"
            class="w-full border rounded-lg px-4 py-2"
            placeholder="Search">
    </div>

    <!-- Tabs -->
    <div class="flex gap-4 mb-4">
        <button class="px-4 py-2 bg-yellow-600 text-white rounded-lg">Upcoming Bookings</button>
        <button class="px-4 py-2 bg-gray-200 rounded-lg">Canceled Bookings</button>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Client Name</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Service</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Date</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Start Time</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">End Time</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold text-gray-700">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y">

                <!-- Example Row -->
                <tr>
                    <td class="px-6 py-4 flex items-center gap-3">
                        <div class="w-8 h-8 bg-gray-300 rounded-full"></div>
                        Rocky Gerung
                    </td>
                    <td class="px-6 py-4"><?php foreach ($recentBookings as $row) : ?></td>
                    <td class="px-6 py-4">2025-10-01</td>
                    <td class="px-6 py-4">10:00</td>
                    <td class="px-6 py-4">10:30</td>
                    <td class="px-6 py-4 text-center">
                        <button class="bg-green-300 text-green-600 px-3 py-1 rounded ">Complete</button>
                        <button class="bg-red-300 text-red-700 px-3 py-1 rounded ml-2">Cancel</button>
                    </td>
                </tr>

                <tr>
                    <td class="px-6 py-4 flex items-center gap-3">
                        <div class="w-8 h-8 bg-gray-300 rounded-full"></div>
                        Rocky Gerung
                    </td>
                    <td class="px-6 py-4">Down Perm</td>
                    <td class="px-6 py-4">2025-10-06</td>
                    <td class="px-6 py-4">11:00</td>
                    <td class="px-6 py-4">11:15</td>
                    <td class="px-6 py-4 text-center">
                        <button class="bg-green-300 text-green-600 px-3 py-1 rounded">Complete</button>
                        <button class="bg-red-300 text-red-700 px-3 py-1 rounded ml-2">Cancel</button>
                    </td>
                </tr>

               

            </tbody>
        </table>
    </div>

</div>

<?= $this->endSection() ?>