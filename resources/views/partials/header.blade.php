<header>
    <div class="top-bar">
        <div class="top-info" style="display: flex; gap: 20px;">
            <span>Email: registrar@kuet.ac.bd</span>
            <span>Phone: +880-41-769468</span>
        </div>
        <div id="weather-widget" style="display: flex; align-items: center; gap: 8px;" title="Weather in Khulna">
            <span id="weather-icon"></span>
            <span id="weather-temp">Loading weather...</span>
            <span id="weather-desc" style="text-transform: capitalize;"></span>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // NOTE: Replace 'YOUR_API_KEY' with your actual OpenWeatherMap API key
        const apiKey = '4735e9ddf755446440ac273a52f3be21'; 
        const city = 'Khulna,BD';
        const url = `https://api.openweathermap.org/data/2.5/weather?q=${city}&units=metric&appid=${apiKey}`;

        fetch(url)
            .then(response => {
                if(!response.ok) throw new Error('Weather fetch failed');
                return response.json();
            })
            .then(data => {
                const temp = Math.round(data.main.temp);
                const desc = data.weather[0].description;
                const iconCode = data.weather[0].icon;
                
                document.getElementById('weather-temp').innerHTML = `<strong>${temp}&deg;C</strong>`;
                document.getElementById('weather-desc').textContent = desc;
                document.getElementById('weather-icon').innerHTML = `<img src="https://openweathermap.org/img/wn/${iconCode}.png" alt="weather" style="height:24px; width:24px; vertical-align:middle; filter: brightness(1.2);">`;
            })
            .catch(error => {
                document.getElementById('weather-temp').textContent = '';
                document.getElementById('weather-desc').textContent = '';
                console.error('Error fetching weather:', error);
            });
    });
    </script>

    <nav class="navbar">
        <div class="logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/kuet_logo.png') }}" alt="KUET Logo" class="nav-logo-img">
                <div class="logo-text">
                    <h1>KUET</h1>
                    <small>Khulna University of Engineering & Technology</small>
                </div>
            </a>
        </div>
        <ul class="nav-menu">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/academics') }}">Academics</a></li>
            <li><a href="{{ url('/faculty') }}">Faculty</a></li>
            <li><a href="{{ url('/research') }}">Research</a></li>
            <li><a href="{{ route('bus-schedule.index') }}">Bus Schedule</a></li>
            <li><a href="{{ route('lost-and-found.index') }}">Lost & Found</a></li>
            <li><a href="{{ url('/administration') }}">Administration</a></li>
            <li><a href="{{ url('/events') }}">Events</a></li>
        </ul>
    </nav>
</header>
