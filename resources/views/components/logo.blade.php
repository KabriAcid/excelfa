<svg
    viewBox="0 0 100 100"
    class="{{ $attributes->get('class', 'w-12 h-12') }}"
    xmlns="http://www.w3.org/2000/svg">
    <!-- Shield Background -->
    <path
        d="M50 5 L85 20 L85 45 Q85 70 50 95 Q15 70 15 45 L15 20 Z"
        fill="url(#blueGradient)"
        stroke="#1e40af"
        stroke-width="2" />

    <!-- Football -->
    <circle cx="50" cy="45" r="18" fill="white" />
    <path
        d="M50 27 L55 37 L45 37 Z M32 45 L42 40 L42 50 Z M68 45 L58 40 L58 50 Z M50 63 L55 53 L45 53 Z"
        fill="#1e40af" />
    <circle cx="50" cy="45" r="18" fill="none" stroke="#1e40af" stroke-width="1.5" />

    <!-- Star accent -->
    <path
        d="M50 20 L52 26 L58 26 L53 30 L55 36 L50 32 L45 36 L47 30 L42 26 L48 26 Z"
        fill="url(#orangeGradient)" />

    <!-- Letter E -->
    <text
        x="50"
        y="85"
        font-size="28"
        font-weight="800"
        fill="white"
        text-anchor="middle"
        font-family="Raleway, sans-serif">
        E
    </text>

    <!-- Gradients -->
    <defs>
        <linearGradient id="blueGradient" x1="0%" y1="0%" x2="0%" y2="100%">
            <stop offset="0%" stop-color="hsl(217, 85%, 52%)" />
            <stop offset="100%" stop-color="hsl(217, 85%, 38%)" />
        </linearGradient>
        <linearGradient id="orangeGradient" x1="0%" y1="0%" x2="0%" y2="100%">
            <stop offset="0%" stop-color="hsl(24, 90%, 50%)" />
            <stop offset="100%" stop-color="hsl(24, 90%, 40%)" />
        </linearGradient>
    </defs>
</svg>