<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
{{--    <meta name="csrf-token" content="{{ csrf_token() }}"--}}
    <title>Document</title>
</head>
<body>
    @vite('resources/js/app.js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(() => {
                if (window.Echo) {
                    console.log("✅ Echo is now ready!");

                    window.Echo.channel('testChannel')
                        .listen('testingEvent', (e) => {
                            console.log("Received event:", e);
                        });

                } else {
                    console.error("❌ Echo is NOT ready!");
                }
            }, 2000);
        });
    </script>
</body>
</html>
