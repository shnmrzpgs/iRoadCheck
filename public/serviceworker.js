var staticCacheName = "pwa-v" + new Date().getTime();
var filesToCache = [
    '/offline',
    '/css/app.css',
    '/js/app.js',
    '/images/icons/icon-72x72.png',
    '/images/icons/icon-96x96.png',
    '/images/icons/icon-128x128.png',
    '/images/icons/icon-144x144.png',
    '/images/icons/icon-152x152.png',
    '/images/icons/icon-192x192.png',
    '/images/icons/icon-384x384.png',
    '/images/icons/icon-512x512.png',
];

// Cache on install
self.addEventListener("install", event => {
    self.skipWaiting();
    event.waitUntil(
        caches.open(staticCacheName).then(cache => {
            return cache.addAll(filesToCache);
        })
    );
});

// Clear old caches on activate
self.addEventListener("activate", event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                    .filter(cacheName => cacheName.startsWith("pwa-") && cacheName !== staticCacheName)
                    .map(cacheName => caches.delete(cacheName))
            );
        })
    );
});

// Serve from Cache & Ensure `X-PWA` Header
self.addEventListener("fetch", event => {
    const request = event.request;

    // Clone the request and add the `X-PWA` header
    const modifiedHeaders = new Headers(request.headers);
    modifiedHeaders.set("X-PWA", "true");

    const modifiedRequest = new Request(request, {
        headers: modifiedHeaders,
        method: request.method,
        mode: request.mode,
        credentials: request.credentials,
        redirect: request.redirect
    });

    event.respondWith(
        fetch(modifiedRequest)
            .then(response => {
                return response;
            })
            .catch(async () => {
                const cachedResponse = await caches.match(request);
                return cachedResponse || caches.match('/offline');
            })
    );
});
