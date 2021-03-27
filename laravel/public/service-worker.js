self.addEventListener("install", e => {
    console.log("Install!");
    e.waitUntil(
        caches.open("static").then(cache => {
            return cache.addAll([
                "./",
                "./css/offline.css",
                "./html/offline.blade.php",
                "./img/cesinkdin-72x72.png",
                "./img/cesinkdin-192x192.png",
                "./img/cesinkdin-512x512.png"
            ]);
        })
    );
});

self.addEventListener("fetch", e => {
    e.respondWith(
        caches.match(e.request).then(response =>{
            return response || fetch(e.request);
        })
    );
});