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
    this.skipWaiting();
    event.waitUntil(
        caches.open(staticCacheName)
            .then(cache => {
                return cache.addAll(filesToCache);
            })
    )
});

// Clear cache on activate
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                    .filter(cacheName => (cacheName.startsWith("pwa-")))
                    .filter(cacheName => (cacheName !== staticCacheName))
                    .map(cacheName => caches.delete(cacheName))
            );
        })
    );
});

// Serve from Cache with X-PWA Header
self.addEventListener("fetch", event => {
    event.respondWith(
        (async () => {
            // Clone the request to modify headers
            const modifiedRequest = new Request(event.request, {
                headers: new Headers({
                    ...Object.fromEntries(event.request.headers.entries()),
                    'X-PWA': 'true'
                }),
                method: event.request.method,
                mode: event.request.mode,
                credentials: event.request.credentials,
                redirect: event.request.redirect,
                referrer: event.request.referrer
            });

            try {
                // Try network first
                const networkResponse = await fetch(modifiedRequest);
                return networkResponse;
            } catch {
                // If offline, try cache
                const cachedResponse = await caches.match(event.request);
                return cachedResponse || caches.match('/offline');
            }
        })()
    );
});
