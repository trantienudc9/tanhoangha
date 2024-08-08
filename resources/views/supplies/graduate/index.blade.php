<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lời Mời Dự Lễ Tốt Nghiệp</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: url('https://images.unsplash.com/photo-1495822290421-2a1e4ed82cc9?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNjUyOXwwfDF8c2VhcmNofDEyfHxvcmdhbmljJTIwYXJjaGl0ZWN0dXJlJTIwY29tcGxleHxlbnwwfHx8fDE2NzA5NTE4MTY&ixlib=rb-1.2.1&q=80&w=1080') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #ffffff;
        }

        .invitation-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            padding: 20px;
        }

        .invitation-card {
            background-color: #ADD8E6;
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            padding: 30px;
            max-width: 700px;
            text-align: center;
            width: 90%;
            animation: fadeIn 1s ease-out;
        }

        .invitation-header {
            margin-bottom: 20px;
        }

        .logo {
            width: 150px;
            height: auto;
            margin-bottom: 10px;
        }

        h1 {
            color: #2c3e50;
            margin: 0;
            font-size: 24px;
        }

        h2 {
            color: #e74c3c;
            margin: 20px 0;
            font-size: 28px;
        }

        p {
            color: #34495e;
            margin: 10px 0;
            font-size: 16px;
        }

        button {
            background-color: #3498db;
            border: none;
            border-radius: 8px;
            color: #ffffff;
            padding: 12px 25px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2980b9;
        }

        .hidden {
            display: none;
        }

        #rsvpMessage {
            color: #2ecc71;
            margin-top: 20px;
            font-size: 18px;
        }

        #countdown {
            font-size: 24px;
            font-weight: bold;
            margin: 20px 0;
        }

        .map {
            margin-top: 30px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .invitation-wrapper{
            background-image: url({{ asset('img/totnghiep')}});
            background-size: cover; /* Tùy chọn để hình ảnh phủ đầy phần tử */
            background-position: center; /* Tùy chọn để hình ảnh căn giữa phần tử */
            background-repeat: no-repeat; /* Tùy chọn để không lặp lại hình ảnh */
        }
    </style>
</head>
<body>
    <div class="invitation-wrapper">
        <div class="invitation-card">
            <div class="invitation-header">
                <img src="{{asset('img/Uneti-2.png')}}" alt="University Logo" class="logo">
                <h1>Lời Mời Dự Lễ Tốt Nghiệp</h1>
            </div>
            <div class="invitation-content">
                <p>Kính gửi : Bố mẹ, thầy cô, anh em, người thân, bạn bè</p>
                <p>Em xin trân trọng thông báo và mời bố mẹ, thầy cô, anh em, người thân, bạn bè tham dự lễ tốt nghiệp của:</p>
                <h2>Trần Tiến Đức</h2>
                <p>Ngày tốt nghiệp: <strong>Ngày 17 tháng 8 năm 2024</strong></p>
                <p>Thời gian: <strong>08:00 AM</strong></p>
                <p>Địa điểm: <strong>Trường Đại học Kinh Tế Kỹ Thuật Công Nghiệp, Hội trường Tầng 2 HA10 </strong></p>
                <div id="countdown" style="color: red"></div>
                <div class="map">

                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.306189115338!2d105.87323077601894!3d20.980359989437773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135afd765487289%3A0x21bd5839ba683d5f!2zVHLGsOG7nW5nIMSQ4bqhaSBI4buNYyBLaW5oIFThur8gS-G7uSBUaHXhuq10IEPDtG5nIE5naGnhu4dw!5e0!3m2!1svi!2s!4v1723095781677!5m2!1svi!2s"
                    width="100%"
                    height="300"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>

                </div>
                {{-- <div class="invitation-footer">
                    <button id="rsvpButton">Xác Nhận Tham Dự</button>
                    <p id="rsvpMessage" class="hidden">Cảm ơn bạn đã xác nhận tham dự!</p>
                </div> --}}
            </div>
        </div>
    </div>
    <script>
        function updateCountdown() {
            // Current date and time in UTC
            const now = new Date();

            // Set the target date to 8:00 AM on August 17, 2024 in Vietnam time
            const targetDate = new Date('August 17, 2024 08:00:00 GMT+0700');

            // Time difference between now and the target date
            const distance = targetDate - now;

            // Calculate days, hours, minutes, and seconds
            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result
            document.getElementById('countdown').innerHTML =
                `${days} ngày ${hours} giờ ${minutes} phút ${seconds} giây còn lại đến ngày tốt nghiệp.`;

            // If the countdown is over, display a message
            if (distance < 0) {
                clearInterval(timer);
                document.getElementById('countdown').innerHTML = 'Ngày tốt nghiệp đã đến!';
            }
        }

        // Update the countdown every 1 second
        const timer = setInterval(updateCountdown, 1000);

        // Initialize the countdown immediately
        updateCountdown();
    </script>
</body>
</html>
